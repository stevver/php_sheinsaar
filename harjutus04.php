<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="UTF-8">
  <title>Harjutus 4</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  
    <h1 class="mb-4">Harjutus 4</h1>
  
    <!-- Jagamine -->
    <div class="card mb-3">
      <div class="card-header">Jagamine</div>
      <div class="card-body">
        <?php
          if (isset($_GET['dividend']) && $_GET['dividend'] !== '' &&
              isset($_GET['divisor']) && $_GET['divisor'] !== '') {
            $dividend = (int) $_GET['dividend'];
            $divisor  = (int) $_GET['divisor'];
            if ($divisor === 0) {
              echo '<div class="alert alert-warning">Jagamine nulliga pole lubatud!</div>';
            } else {
              $result = $dividend / $divisor;
              echo '<div class="alert alert-info">Jagamise tulemus on ' . $result . '.</div>';
            }
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="dividend">Sisesta dividend (täisarv):</label>
            <input type="number" name="dividend" id="dividend" class="form-control">
          </div>
          <div class="form-group">
            <label for="divisor">Sisesta jagaja (täisarv):</label>
            <input type="number" name="divisor" id="divisor" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Jaga</button>
        </form>
      </div>
    </div>
    
    <!-- Vanus (if...elseif) -->
    <div class="card mb-3">
      <div class="card-header">Vanus (if…elseif)</div>
      <div class="card-body">
        <?php
          if (isset($_GET['age1']) && $_GET['age1'] !== '' &&
              isset($_GET['age2']) && $_GET['age2'] !== '') {
            $age1 = (int) $_GET['age1'];
            $age2 = (int) $_GET['age2'];
            if ($age1 == $age2) {
              echo '<div class="alert alert-info">Nad on ühevanused.</div>';
            } elseif ($age1 > $age2) {
              echo '<div class="alert alert-info">Esimene isik on vanem.</div>';
            } else {
              echo '<div class="alert alert-info">Teine isik on vanem.</div>';
            }
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="age1">Sisesta esimese isiku vanus:</label>
            <input type="number" name="age1" id="age1" class="form-control">
          </div>
          <div class="form-group">
            <label for="age2">Sisesta teise isiku vanus:</label>
            <input type="number" name="age2" id="age2" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Võrdle</button>
        </form>
      </div>
    </div>
    
    <!-- Ristkülik või ruut -->
    <div class="card mb-3">
      <div class="card-header">Ristkülik või ruut</div>
      <div class="card-body">
        <?php
          if (isset($_GET['rect_length']) && $_GET['rect_length'] !== '' &&
              isset($_GET['rect_width']) && $_GET['rect_width'] !== '') {
            $rect_length = (float) $_GET['rect_length'];
            $rect_width  = (float) $_GET['rect_width'];
            if ($rect_length == $rect_width) {
              echo '<div class="alert alert-info">Antud mõõtmetega saab moodustada ruudu.</div>';
            } else {
              echo '<div class="alert alert-info">Antud mõõtmetega saab moodustada ristküliku.</div>';
            }
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="rect_length">Sisesta ristküliku pikkus:</label>
            <input type="number" step="any" name="rect_length" id="rect_length" class="form-control">
          </div>
          <div class="form-group">
            <label for="rect_width">Sisesta ristküliku laius:</label>
            <input type="number" step="any" name="rect_width" id="rect_width" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Kontrolli</button>
        </form>
      </div>
    </div>
    
    <!-- Ristkülik või ruut II with drawing -->
    <div class="card mb-3">
      <div class="card-header">Ristkülik või ruut II</div>
      <div class="card-body">
        <?php
          if (isset($_GET['rect2_a']) && $_GET['rect2_a'] !== '' &&
              isset($_GET['rect2_b']) && $_GET['rect2_b'] !== '') {
            $rect2_a = (float) $_GET['rect2_a'];
            $rect2_b = (float) $_GET['rect2_b'];
            $scale = 20; // Skaala: 20 pixelit ühiku kohta
            $drawingWidth = $rect2_a * $scale;
            $drawingHeight = $rect2_b * $scale;
            
            if ($rect2_a == $rect2_b) {
              echo '<div class="alert alert-info">Antud väärtustega moodustub ruut.</div>';
            } else {
              echo '<div class="alert alert-info">Antud väärtustega moodustub ristkülik.</div>';
            }
            
            // Kuvame joonise
            echo '<div class="mt-3" style="display: flex; justify-content: center;">';
            echo '<div style="width:' . $drawingWidth . 'px; height:' . $drawingHeight . 'px; border: 2px solid #007bff;"></div>';
            echo '</div>';
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="rect2_a">Sisesta külje pikkus 1:</label>
            <input type="number" step="any" name="rect2_a" id="rect2_a" class="form-control">
          </div>
          <div class="form-group">
            <label for="rect2_b">Sisesta külje pikkus 2:</label>
            <input type="number" step="any" name="rect2_b" id="rect2_b" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Kontrolli</button>
        </form>
      </div>
    </div>
    
    <!-- Juubel -->
    <div class="card mb-3">
      <div class="card-header">Juubel</div>
      <div class="card-body">
        <?php
          if (isset($_GET['birth_year']) && $_GET['birth_year'] !== '') {
            $birth_year  = (int) $_GET['birth_year'];
            $currentYear = (int) date("Y");
            $age         = $currentYear - $birth_year;
            if ($age % 5 == 0) {
              echo '<div class="alert alert-info">Juubel! Te olete ' . $age . ' aastat vana.</div>';
            } else {
              echo '<div class="alert alert-info">Ei ole juubeliaasta. Te olete ' . $age . ' aastat vana.</div>';
            }
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="birth_year">Sisesta oma sünniaasta:</label>
            <input type="number" name="birth_year" id="birth_year" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Kontrolli</button>
        </form>
      </div>
    </div>
    
    <!-- Hinne (switch) -->
    <div class="card mb-3">
      <div class="card-header">Hinne</div>
      <div class="card-body">
        <?php
          if (isset($_GET['points']) && $_GET['points'] !== '') {
            $points = $_GET['points'];
            switch (true) {
              case (!is_numeric($points)):
                $gradeMessage = "SISESTA OMA PUNKTID!";
                break;
              case ($points > 10):
                $gradeMessage = "SUPER!";
                break;
              case ($points >= 5 && $points <= 9):
                $gradeMessage = "TEHTUD!";
                break;
              case ($points < 5):
                $gradeMessage = "KASIN!";
                break;
              default:
                $gradeMessage = "SISESTA OMA PUNKTID!";
            }
            echo '<div class="alert alert-info">Hinne: ' . $gradeMessage . '</div>';
          }
        ?>
        <form action="harjutus04.php" method="get">
          <div class="form-group">
            <label for="points">Sisesta oma KT punktide arv:</label>
            <input type="text" name="points" id="points" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Arvuta hinne</button>
        </form>
      </div>
    </div>
    
  </div>
  
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
