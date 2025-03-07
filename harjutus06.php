<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 6</h1>
        <h3>Genereeri arvud vahemikus 1-100:</h3>
        <?php
            for ($number = 1; $number <= 100; $number++) {
                echo $number . ". ";
                if ($number < 100) {
                }
                if ($number % 10 == 0) {
                    echo "<br>";
                }
            }
        ?>

        <br>
        <h3>Tärnide rida:</h3>
        <?php
            for ($number = 1; $number <= 10; $number++) {
                echo "*";
            }
        ?>

        <br>
        <h3>Vertikaalne tärnide rida:</h3>
        <?php
            for ($number = 1; $number <= 10; $number++) {
                echo "*<br>";
            }
        ?>

        <br>
        <h3>Tärnidega ruut:</h3>
        <?php
            for ($number = 1; $number <= 5; $number++) {
                for ($number2 = 1; $number2 <= 5; $number2++) {
                    echo "* ";
                }
                echo "<br>";
            }
        ?>

        <br>
        <h3>Kahanevad arvud:</h3>
        <?php
            for ($number = 10; $number >= 1; $number--) {
                echo $number . ". ";
                echo "<br>";
            }
        ?>

        <br>
        <h3>Kolmega jagunevad arvud:</h3>
        <?php
            for ($number = 1; $number <= 100; $number++) {
                if ($number % 3 == 0) {
                    echo $number . ", ";
                }
            }
        ?>

        <br>
        <h3>Poiste ja tüdrukute paarid:</h3>
        <?php
            $naised = array("Mari", "Kati", "Liina");
            $mehed = array("Jüri", "Mati", "Peeter");
            for($number = 0; $number < count($naised); $number++) {
                echo $naised[$number] . " ja " . $mehed[$number] . "<br>";
            }
        ?>
    </div>
</body>
</html>