<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <h1>Harjutus 14</h1>
        <h3>Suvaline pilt</h3>
        <?php
            $kataloog = 'uploads';
            $asukoht=opendir($kataloog);
            $pildid = [];
            while($rida = readdir($asukoht)){
                if($rida!='.' && $rida!='..'){
                    $pildid[] = $rida;
                }
            }
            closedir($asukoht);
            $suvaline_pilt = $pildid[array_rand($pildid)];
            $pildi_aadress = 'uploads/'.$suvaline_pilt;
            echo "<img width='800px' src='$pildi_aadress'><br>";
        ?>

        <br>
        <hr>
        <h3>Pisipildid</h3>
        <?php
            $pisi_pildi_laius = 200;
            $pisi_pildi_korgus = 115;
            $veergude_arv = 3;
            $rida = 0;
            echo '<div class="row">';
            foreach ($pildid as $pilt) {
            $pildi_aadress = 'uploads/'.$pilt;
            echo '<div class="col-md-4 mb-3">';
            echo "<a href='$pildi_aadress' target='_blank'><img width='$pisi_pildi_laius' height='$pisi_pildi_korgus' src='$pildi_aadress'></a><br>";
            echo '</div>';
            $rida++;
            if ($rida % $veergude_arv == 0) {
                echo '</div><div class="row">';
            }
            }
            echo '</div>';
        ?>
    </div>
</body>
</html>