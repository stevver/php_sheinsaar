<?php
// Määrame üleslaadimiskataloogi
$target_dir = "uploads/";

// Kui kataloog puudub, loome selle (sendime ka alamkataloogide loomise vajadusel)
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Muutuja teate jaoks
$message = "";

if (isset($_POST["submit"])) {
    // Kontrollime, kas fail on valitud ja üleslaadimise protsessis vigu ei esine
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $file_name = $_FILES["image"]["name"];
        $file_tmp  = $_FILES["image"]["tmp_name"];
        // Faili laiendi määramine ja muutmine väikesteks tähtedeks
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Lubatud faililaiendid: jpg ja jpeg
        if ($extension == "jpg" || $extension == "jpeg") {
            // Veendume, et fail on pilt
            if (getimagesize($file_tmp) !== false) {
                // Loome faili nime unikaalseks – lisame ajatempli
                $new_name = time() . "_" . basename($file_name);
                $target_file = $target_dir . $new_name;
                
                // Proovime faili teisaldada
                if (move_uploaded_file($file_tmp, $target_file)) {
                    $message = "Faili üleslaadimine õnnestus!";
                } else {
                    $message = "Faili üleslaadimine ebaõnnestus! Veendu, et kataloog '$target_dir' eksisteerib ja on kirjutatav.";
                }
            } else {
                $message = "Valitud fail ei ole pilt!";
            }
        } else {
            $message = "Lubatud on ainult JPG ja JPEG failid!";
        }
    } else {
        $message = "Palun vali fail üleslaadimiseks!";
    }
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Pildi üleslaadimine ja kuvamine</title>
    <style>
        /* Pisipiltide kujundus */
        .thumb {
            width: 150px;
            margin: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            transition: 0.3s;
        }
        .thumb:hover {
            border-color: #777;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

<h2>Pildi üleslaadimine</h2>
<form action="" method="post" enctype="multipart/form-data">
    <!-- failide valikul on piiranguks lisatud ainult .jpg ja .jpeg -->
    <input type="file" name="image" accept=".jpg,.jpeg"><br><br>
    <input type="submit" name="submit" value="Lae üles!">
</form>
<p><?php echo $message; ?></p>

<hr>
<h2>Üleslaetud pildid</h2>
<div class="gallery">
<?php
// Avame üleslaadimiskataloogi ja loeme selle sisu
if (is_dir($target_dir)) {
    if ($handle = opendir($target_dir)) {
        while (($file = readdir($handle)) !== false) {
            // Ignoreeri kataloogi enda kirjeid
            if ($file != "." && $file != "..") {
                // Kontrollime faililaiendit
                $file_ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if ($file_ext == "jpg" || $file_ext == "jpeg") {
                    // Kuvame iga pildi klikkitava lingina – klikk avab täissuuruse pildi uues aknas
                    echo '<a href="'.$target_dir.$file.'" target="_blank"><img src="'.$target_dir.$file.'" class="thumb" alt="Pilt"></a>';
                }
            }
        }
        closedir($handle);
    }
}
?>
</div>

</body>
</html>