<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sõiduaeg arvutamine
$timeResult = "";
$timeError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] === "calcTime") {
    $start = trim($_POST['start']);
    $end = trim($_POST['end']);

    // Valideerimine
    if (empty($start) || empty($end)) {
        $timeError = "Palun sisesta nii algusaeg kui lõppaeg.";
    } elseif (strlen($start) < 5 || strlen($end) < 5 || 
              !preg_match('/^\d{2}:\d{2}$/', $start) || 
              !preg_match('/^\d{2}:\d{2}$/', $end)) {
        $timeError = "Sisestatud aja formaat peab olema hh:mm (näiteks 08:30).";
    } else {
        // Tunnid ja minutid
        list($startHour, $startMinute) = explode(":", $start);
        list($endHour, $endMinute) = explode(":", $end);

        $startTotal = ((int)$startHour * 60) + (int)$startMinute;
        $endTotal = ((int)$endHour * 60) + (int)$endMinute;

        // Kontroll
        if ($endTotal < $startTotal) {
            $timeError = "Lõppaeg peab olema suurem kui algusaeg.";
        } else {
            $difference = $endTotal - $startTotal;
            $hours = floor($difference / 60);
            $minutes = $difference % 60;
            $timeResult = "Sõiduaeg: $hours tundi ja $minutes minutit.";
        }
    }
}

// Palkade võrdlus
$maleSalaries = array();
$femaleSalaries = array();
$csvFile = 'tootajad.csv';

if (file_exists($csvFile)) {
    $fp = fopen($csvFile, "r") or die("Faili avamine nurjus.");
    while (($data = fgetcsv($fp, 1000, ";")) !== false) {
        if (count($data) < 3) {
            continue;
        }
        $name = trim($data[0]);
        $gender = strtolower(trim($data[1]));
        $salary = trim($data[2]);

        if (!is_numeric($salary)) {
            continue;
        }
        $salary = (float)$salary;

        // Meeste ja naiste palgad eraldi massiividesse
        if ($gender == 'm') {
            $maleSalaries[] = $salary;
        } elseif ($gender == 'n') {
            $femaleSalaries[] = $salary;
        }
    }
    fclose($fp);
}

// Keskmine palk
function calculateAverage($salaries) {
    if (count($salaries) > 0) {
        return array_sum($salaries) / count($salaries);
    }
    return 0;
}

$averageMale = calculateAverage($maleSalaries);
$averageFemale = calculateAverage($femaleSalaries);
$avgMaleRounded = round($averageMale);
$avgFemaleRounded = round($averageFemale);
$maxMale = (count($maleSalaries) > 0) ? max($maleSalaries) : 0;
$maxFemale = (count($femaleSalaries) > 0) ? max($femaleSalaries) : 0;
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Ülesanne 12 – Sõiduaeg ja Palkade võrdlus</title>
</head>
<body>
    <h1>Sõiduaeg arvutamine</h1>
    <form method="post" action="">
        <input type="hidden" name="action" value="calcTime">
        <label>Algusaeg (hh:mm): </label>
        <input type="text" name="start" placeholder="nt 08:30" required>
        <br><br>
        <label>Lõppaeg (hh:mm): </label>
        <input type="text" name="end" placeholder="nt 10:15" required>
        <br><br>
        <button type="submit">Arvuta sõiduaeg</button>
    </form>
    <?php if (!empty($timeError)): ?>
        <p style="color:red;"><?php echo $timeError; ?></p>
    <?php elseif (!empty($timeResult)): ?>
        <p><?php echo $timeResult; ?></p>
    <?php endif; ?>

    <hr>

    <h1>Palkade võrdlus: Sooline diskrimineerimine</h1>
    <p>Meeste keskmine palk: <?php echo $avgMaleRounded; ?></p>
    <p>Naiste keskmine palk: <?php echo $avgFemaleRounded; ?></p>
    <p>Kõrgeim meeste palk: <?php echo $maxMale; ?></p>
    <p>Kõrgeim naiste palk: <?php echo $maxFemale; ?></p>
    <?php
    // Diskrimineerimise analüüs
    if ($avgMaleRounded > $avgFemaleRounded) {
        echo "<p>Diskrimineerimise analüüs: Meeste keskmine palk on kõrgem kui naiste keskmine palk, mis võib viidata soolisele diskrimineerimisele.</p>";
    } elseif ($avgFemaleRounded > $avgMaleRounded) {
        echo "<p>Diskrimineerimise analüüs: Naiste keskmine palk on kõrgem kui meeste keskmine palk, mis võib viidata soolisele diskrimineerimisele.</p>";
    } else {
        echo "<p>Diskrimineerimise analüüs: Meeste ja naiste keskmised palgad on võrdsed.</p>";
    }
    ?>
</body>
</html>