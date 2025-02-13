<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Harjutus 06</title>
</head>
<body>
    <h1>Harjutus 06</h1>
    <br>
    <hr>
    <?php
    // 1. GENEREERI – Loo arvud 1-100, lisa iga arvu järele punkt ja tee reavahetus iga 10 arvu järel
    echo "<h3>1. Genereeri arvud 1-100</h3>";
    for ($i = 1; $i <= 100; $i++) {
        echo $i . ". ";
        if ($i % 10 == 0) {
            echo "<br>";
        }
    }
    echo "<hr>";

    // 2. RIDA – Koosta tärnidest horisontaalne rida (10 tärni)
    echo "<h3>2. Rida – Horisontaalne tärnide rida</h3>";
    echo str_repeat("*", 10) . "<br>";
    echo "<hr>";

    // 3. RIDA II – Koosta tärnidest vertikaalne rida (10 tärni, igaüks uuel real)
    echo "<h3>3. Rida II – Vertikaalne tärnide rida</h3>";
    for ($i = 0; $i < 10; $i++) {
        echo "*<br>";
    }
    echo "<hr>";

    // 4. RUUT – Loo tsükli abil tärnidest ruut, mille mõõdu kasutaja saab valida läbi veebivormi
    echo "<h3>4. Ruut – Tärnidest ruut (suurus kasutaja valik)</h3>";
    ?>
    <form method="get" action="">
        <label for="size">Sisesta ruudu külje pikkus:</label>
        <input type="number" id="size" name="size" value="<?php echo isset($_GET['size']) ? htmlspecialchars($_GET['size']) : 5; ?>">
        <input type="submit" value="Loo ruut">
    </form>
    <?php
    $size = isset($_GET['size']) ? (int)$_GET['size'] : 5;
    if ($size > 0) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
    }
    echo "<hr>";

    // 5. KAHANEV – Väljasta arvud 10-st 1-ni
    echo "<h3>5. Kahanev – Arvud 10-st 1-ni</h3>";
    for ($i = 10; $i >= 1; $i--) {
        echo $i . "<br>";
    }
    echo "<hr>";

    // 6. KOLEMAGA JAGUNEVAD – Tekita arvud 1-100 ning kuva ainult need, mis jaguvad kolmega (3, 6, 9 jne)
    echo "<h3>6. Kolmega jagunevad arvud 1-st 100-ni</h3>";
    $divisibleBy3 = array();
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 == 0) {
            $divisibleBy3[] = $i;
        }
    }
    echo implode(", ", $divisibleBy3);
    echo "<hr>";

    // 7. MASSIIVID JA TSÜKLID – Loo poiste ja tüdrukute massiivid ning väljasta paarid igal real
    echo "<h3>7. Poiste ja tüdrukute paarid</h3>";
    $boys = array("John", "Mike", "Tom");
    $girls = array("Anna", "Emma", "Sophia");
    for ($i = 0; $i < count($boys); $i++) {
        echo $boys[$i] . " & " . $girls[$i] . "<br>";
    }
    echo "<hr>";

    // 8. MASSIIVID JA TSÜKLID (Bonus) – Tee koopiad poiste ja tüdrukute massiividest ning tekita suvalised paarid nii, et ükski nimi ei kordu
    echo "<h3>8. Bonus – Suvalised paarid (nimed ei kordu)</h3>";
    // Tee massiivide koopiad
    $boysCopy = $boys;
    $girlsCopy = $girls;
    // Sega massiivid juhuslikult
    shuffle($boysCopy);
    shuffle($girlsCopy);
    for ($i = 0; $i < count($boysCopy); $i++) {
        echo $boysCopy[$i] . " & " . $girlsCopy[$i] . "<br>";
    }
    ?>
</body>
</html>