<h1>Harjutus 01</h1>
<?php
    // Harjutus01, Stever Heinsaar, 07.02.2025
    
    echo "\"It's My Life\" – Dr. Alban<br>";
    echo "<br>";
    echo "(\(\<br>( -.-)<br>o_('')('')";
?>

<h1>Harjutus 02</h1>
<?php
    // Ülesanne 2, Stever Heinsaar, 07.02.2025

    // 1. Kaks täisarvulist muutujat ja nende tehete arvutused
    $num1 = 15;
    $num2 = 4;
    
    printf("Arvutused kahe täisarvu %d ja %d vahel:<br>", $num1, $num2);
    printf("%d + %d = %d<br>", $num1, $num2, $num1 + $num2);
    printf("%d - %d = %d<br>", $num1, $num2, $num1 - $num2);
    printf("%d * %d = %d<br>", $num1, $num2, $num1 * $num2);
    printf("%d / %d = %.2f<br>", $num1, $num2, $num1 / $num2);
    printf("%d %% %d = %d<br>", $num1, $num2, $num1 % $num2);

    echo "<br>";

    // 2. Millimeetrite teisendamine sentimeetriteks ja meetriteks
    $mm = 1234.56;
    $cm = $mm / 10;
    $m  = $mm / 1000;
    
    printf("%.2f mm = %.2f cm<br>", $mm, $cm);
    printf("%.2f mm = %.2f m<br>", $mm, $m);

    echo "<br>";

    // 3. Täisnurkse kolmnurga ümbermõõdu ja pindala arvutamine
    // Kasutame katete väärtustena 3 ja 4
    $sideA = 3;
    $sideB = 4;
    $hypotenuse = sqrt(pow($sideA, 2) + pow($sideB, 2));

    // Arvutame ümbermõõdu ja pindala, ümardatult täisarvuni
    $perimeter = round($sideA + $sideB + $hypotenuse);
    $area      = round(($sideA * $sideB) / 2);

    // Näitame ka, millised küljed on kasutatud
    printf("Kolmnurga küljed: %d cm ja %d cm<br>", $sideA, $sideB, $hypotenuse);
    printf("Täisnurkse kolmnurga ümbermõõt on %d cm ja pindala on %d cm².", $perimeter, $area);
?>