<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 13</h1>
        <h3>Pildi üleslaadimine:</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="minu_fail" accept="image/jpeg, image/jpg"><br>
            <br>
            <input type="submit" value="Lae üles" class="btn btn-primary">
        </form>

        <?php
            $pildi_asukoht = 'uploads/';
            if (isset($_FILES["minu_fail"]) && $_FILES["minu_fail"]["error"] == 0) {
                $file_name = $_FILES["minu_fail"]["name"];
                $file_tmp  = $_FILES["minu_fail"]["tmp_name"];
                $laiend = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                if ($laiend == 'jpg' || $laiend == 'jpeg') {
                    move_uploaded_file($file_tmp, $pildi_asukoht . $file_name);
                    echo '<p>Fail on üles laetud.</p>';
                } else {
                    echo '<p>Fail peab olema JPG või JPEG formaadis.</p>';
                }
            }
        ?>

        <br>
        <h3>Üles laetud pildid:</h3>
        <form method="post" action="">
            <select name="pildid">
                <option value="">Vali pilt</option>
                    <?php 
                        $kataloog = 'uploads';
                        $asukoht=opendir($kataloog);
                        while($rida = readdir($asukoht)){
                            if($rida!='.' && $rida!='..'){
                                echo "<option value='$rida'>$rida</option>\n";
                            }
                        }
                    
                    ?>
            </select>
                <input type="submit" value="Vaata" class="btn btn-primary">
                <br>
                <?php
                    if(!empty($_POST['pildid'])){
                        $pilt = $_POST['pildid'];
                        $pildi_aadress = 'uploads/'.$pilt;
                    
                        echo "<img width='800px' src='$pildi_aadress'><br>";
                    }
                ?>
        </form>
    </div>
</body>
</html>