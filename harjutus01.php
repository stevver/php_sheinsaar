<h1>Harjutus 01</h1>
<?php
    // Harjutus01, Stever Heinsaar, 07.02.2025
    
    echo "\"It's My Life\" – Dr. Alban<br>";
    echo "<br>";
    echo "(\(\<br>( -.-)<br>o_('')('')";
?>

<h1>Harjutus 02</h1>
<?php
// Harjutus 02, Stever Heinsaar, 07.02.2025

if (
    isset($_GET['num1']) && isset($_GET['num2']) &&
    isset($_GET['mm'])   && isset($_GET['sideA']) &&
    isset($_GET['sideB'])
) {
    // Retrieve input values from the GET parameters
    $num1  = (int) $_GET['num1'];
    $num2  = (int) $_GET['num2'];
    $mm    = (float) $_GET['mm'];
    $sideA = (int) $_GET['sideA'];
    $sideB = (int) $_GET['sideB'];

    echo "<h3>Arvutuste Tulemused</h3>";

    // 1. Arithmetic operations
    printf("Arvutused kahe täisarvu %d ja %d vahel:<br>", $num1, $num2);
    printf("%d + %d = %d<br>", $num1, $num2, $num1 + $num2);
    printf("%d - %d = %d<br>", $num1, $num2, $num1 - $num2);
    printf("%d * %d = %d<br>", $num1, $num2, $num1 * $num2);
    if ($num2 != 0) {
        printf("%d / %d = %.2f<br>", $num1, $num2, $num1 / $num2);
        printf("%d %% %d = %d<br>", $num1, $num2, $num1 % $num2);
    } else {
        echo "Jagamine ja jäägi leidmine nulliga ei ole lubatud.<br>";
    }
    echo "<br>";

    // 2. Unit conversion from millimeters to centimeters and meters
    $cm = $mm / 10;
    $m  = $mm / 1000;
    printf("%.2f mm = %.2f cm<br>", $mm, $cm);
    printf("%.2f mm = %.2f m<br>", $mm, $m);
    echo "<br>";

    // 3. Right triangle calculations
    $hypotenuse = sqrt(pow($sideA, 2) + pow($sideB, 2));
    $perimeter  = round($sideA + $sideB + $hypotenuse);
    $area       = round(($sideA * $sideB) / 2);
    // Display the input sides along with the calculated hypotenuse
    printf("Kolmnurga küljed: %d cm ja %d cm, hüpotenuus = %.2f cm<br>", $sideA, $sideB, $hypotenuse);
    printf("Täisnurkse kolmnurga ümbermõõt on %d cm ja pindala on %d cm².<br>", $perimeter, $area);
    
    echo "<br><a href='harjutus01.php'>Uuesti</a>";

} else {
    echo '<form action="harjutus01.php" method="get">';
    
    echo '<h3>Arvutuste Sisend (täisarvud)</h3>';
    echo 'Number 1: <input type="number" name="num1" required><br>';
    echo 'Number 2: <input type="number" name="num2" required><br><br>';
    
    echo '<h2>Millimeetrite teisendamise Sisend</h2>';
    echo 'Millimeetrid (mm): <input type="number" step="any" name="mm" required><br><br>';
    
    echo '<h2>Täisnurkse kolmnurga sisend</h2>';
    echo 'Katet A (cm): <input type="number" name="sideA" required><br>';
    echo 'Katet B (cm): <input type="number" name="sideB" required><br><br>';
    
    echo '<input type="submit" value="Arvuta">';
    echo '</form>';
}
?>

<h1>Harjutus 03</h1>
<?php
// Ülesanne 3, Stever Heinsaar, 07.02.2025

if (
    isset($_GET['trapz_a']) && 
    isset($_GET['trapz_b']) && 
    isset($_GET['trapz_h']) && 
    isset($_GET['rhombus_side'])
) {
    // Parameetrite toomine
    $a    = (float) $_GET['trapz_a'];
    $b    = (float) $_GET['trapz_b'];
    $h    = (float) $_GET['trapz_h'];
    $side = (float) $_GET['rhombus_side'];
    
    // Trapetsi pindala arvutamine ja ümardamine ühe komakohani  
    $area = (($a + $b) * $h) / 2;
    $area = round($area, 1);
    
    // Rombi ümbermõõdu arvutamine ja ümardamine ühe komakohani  
    $perimeter = 4 * $side;
    $perimeter = round($perimeter, 1);
    
    // Väljasta tulemused täislausega
    printf("Trapetsi pindala on %.1f ühikut.<br>", $area);
    printf("Rombi ümbermõõt on %.1f ühikut.<br>", $perimeter);
    
    echo "<br><a href='harjutus01.php'>Uuesti</a>";
} else {
    // Kuvame HTML vormi puhast PHP koodi abil
    echo "<form action='harjutus01.php' method='get'>";
    
    echo "<h2>Trapetsi andmed</h2>";
    echo "Alus 1 (a): <input type='number' step='any' name='trapz_a' required><br>";
    echo "Alus 2 (b): <input type='number' step='any' name='trapz_b' required><br>";
    echo "Kõrgus (h): <input type='number' step='any' name='trapz_h' required><br><br>";
    
    echo "<h2>Rombi andmed</h2>";
    echo "Külje pikkus: <input type='number' step='any' name='rhombus_side' required><br><br>";
    
    echo "<input type='submit' value='Arvuta'>";
    echo "</form>";
}
?>