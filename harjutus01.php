<!--Stever Heinsaar
06.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harjutus1-3</title>
    <meta name="keywords" content="HTML, php">
    <meta name="author" content="Stever">
</head>

<body>
    <h1>Harjutus 1</h1>
    <?php
    echo "\"It's My Life\" – Dr. Alban<br>";
    echo "<br>";
    echo "(\(\<br>( -.-)<br>o_('')('')";
    ?>

    <h1>Harjutus 2</h1>
    <h2>Arvutamine</h2>
    <form action="harjutus01.php" method="get">
        a <input type="number" name="a"><br>
        b <input type="number" name="b"><br>
        <input type="submit" value="Arvuta">
    </form>

    <?php
    if (isset($_GET['a']) && isset($_GET['b'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $liit = $a + $b;
        $lahut = $a - $b;
        $korrut = $a * $b;
        $jagat = $a / $b;
        echo "$a + $b = $liit<br> $a - $b = $lahut<br> $a * $b = $korrut<br> $a / $b = $jagat";
        }
    ?>

    <h2>Teisendamine</h2>
    <form action="harjutus01.php" method="get">
        Sisesta millimeetrid <input type="number" name="mm"><br>
        <input type="submit" value="Teisenda">
    </form>

    <?php
    if (isset($_GET['mm'])) {
        $mm = $_GET['mm'];
        $cm = $mm / 10;
        $m = round($mm / 1000, 2);
        echo "$mm mm on $cm cm<br> $mm mm on $m m";
    }
    ?>

    <h2>Kolmnurk</h2>
    <form action="harjutus01.php" method="get">
        a <input type="number" name="kylg_a"><br>
        b <input type="number" name="kylg_b"><br>
        <input type="submit" value="Arvuta">
    </form>

    <?php
    if (isset($_GET['kylg_a']) && isset($_GET['kylg_b'])) {
        $a = $_GET['kylg_a'];
        $b = $_GET['kylg_b'];
        $c = round(sqrt($a ** 2 + $b ** 2));
        $p = round($a + $b + $c);
        $s = round($a * $b / 2);
        echo "Hüpotenuus on $c<br> Ümbermõõt on $p<br> Pindala on $s";
    }
    ?>

    <h1>Harjutus 3</h1>
    <form action="harjutus01.php" method="get">
        a <input type="number" name="arv1"><br>
        b <input type="number" name="arv2"><br>
        c <input type="number" name="arv3"><br>
        <input type="submit" value="Arvuta">
    </form>

    <?php
    if (isset($_GET['arv1']) && isset($_GET['arv2']) && isset($_GET['arv3'])) {
        $a = $_GET['arv1'];
        $b = $_GET['arv2'];
        $c = $_GET['arv3'];
        $trapetsi_s = round(($a + $b) / 2 * $c);
        $rombi_p = $a * 4;
        echo "Trapetsi pindala on $trapetsi_s<br> Rombi ümbermõõt on $rombi_p";
    }
    ?>

</body>
</html>