<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Harjutus 4</h1>
        <br>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <form>
              <div class="mb-3">
                <label for="arv1" class="form-label">Esimene arv</label>
                <input type="number" class="form-control" id="arv1" name="arv1">
              </div>
              <div class="mb-3">
                <label for="arv2" class="form-label">Teine arv</label>
                <input type="number" class="form-control" id="arv2" name="arv2">
              </div>
              <div class="mb-3">
                <label for="aasta" class="form-label">Sünniaasta</label>
                <input type="number" class="form-control" id="aasta" name="aasta">
              </div>
              <div class="mb-3">
                <label for="punktid" class="form-label">Punktid</label>
                <input type="number" class="form-control" id="punktid" name="punktid">
              </div>
              <button type="submit" class="btn btn-primary">Arvuta</button>
            </form>
            <br>
            <?php
              if (!empty($_GET['arv1']) && !empty($_GET['arv2']) && !empty($_GET['aasta']) && !empty($_GET['punktid'])) {
                $punktid = $_GET['punktid'];
                $arv1 = $_GET['arv1'];
                $arv2 = $_GET['arv2'];
                $aasta = $_GET['aasta'];
                if ($arv2 == 0) {
                  echo '<div class="alert alert-danger" role="alert">Nulliga ei saa jagada</div>';
                } else {
                  $jagamine = $arv1 / $arv2;
                  echo '<div class="alert alert-success" role="alert">Jagamise vastus: ' . $jagamine . '</div>';
                }
                if ($arv1 > $arv2) {
                  echo '<div class="alert alert-success" role="alert">Esimene arv on suurem</div>';
                } elseif ($arv1 < $arv2) {
                  echo '<div class="alert alert-success" role="alert">Teine arv on suurem</div>';
                } else {
                  echo '<div class="alert alert-success" role="alert">Arvud on võrdsed</div>';
                }
                if ($arv1 == $arv2) {
                  echo '<div class="alert alert-success" role="alert">Tegemist on ruuduga<img src="https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/48x48/plain/shape_square.png" alt=""></div>';
                } else {
                  echo '<div class="alert alert-success" role="alert">Tegemist on ristkülikuga<img src="https://www.iconexperience.com/_img/o_collection_png/green_dark_grey/48x48/plain/shape_rectangle.png" alt=""></div>';
              }
                if ($aasta%5 == 0) {
                  echo '<div class="alert alert-success" role="alert">Juubel</div>';
                } else {
                  echo '<div class="alert alert-success" role="alert">Ei ole juubel</div>';
                }

                switch($punktid) {
                  case ($punktid >= 10): echo '<div class="alert alert-success" role="alert">SUPER!</div>';
                  break;
                  case ($punktid >= 5 and $punktid<10): echo '<div class="alert alert-success" role="alert">Tehtud!</div>';
                  break;
                  case ($punktid < 5): echo '<div class="alert alert-success" role="alert">Kasin!</div>';
                  break;
                  default: echo 'Sisesta oma punktid!';
                }
              }
            ?>
          </div>
        </div>
    </div>
</body>
</html>