<?php
// Timezone
date_default_timezone_set("Europe/Tallinn");

// Kuupäeva ja kellaaeg
echo date("d.m.Y H:i") . "<br><br>";

// Vanuse arvutamine sünniaasta põhjal
if (isset($_POST['birthYear'])) {
    $birthYear = intval($_POST['birthYear']);
    $currentYear = date("Y");
    
    $age = $currentYear - $birthYear;
    echo "Sellel aastal oled/võid saada " . $age . " aastat vana.<br><br>";
} else {
    echo '<form method="post" action="">
            <label for="birthYear">Sisesta oma sünniaasta:</label>
            <input type="number" name="birthYear" id="birthYear" min="1900" max="2100" required>
            <input type="submit" value="Saada">
          </form><br>';
}

// Kooli lõppuni jäänud päevade arv
$endOfSchoolDate = DateTime::createFromFormat("d.m.Y", "22.06." . date("Y"));
$today = new DateTime();
if ($today > $endOfSchoolDate) {
    $endOfSchoolDate->modify('+1 year');
}
$interval = $today->diff($endOfSchoolDate);
echo date("Y") . " kooliaasta lõpuni on jäänud " . $interval->days . " päeva!<br><br>";

// Aastaeg ja vastav pilt
$currentMonth = date("n");
if ($currentMonth >= 3 && $currentMonth <= 5) {
    $seasonImage = "img/kevad.jpg";
    $currentSeason = "kevad";
} elseif ($currentMonth >= 6 && $currentMonth <= 8) {
    $seasonImage = "img/suvi.jpg";
    $currentSeason = "suvi";
} elseif ($currentMonth >= 9 && $currentMonth <= 11) {
    $seasonImage = "img/sugis.jpg";
    $currentSeason = "sügis";
} else {
    $seasonImage = "img/talv.jpg";
    $currentSeason = "talv";
}

echo "Praegune aastaeg: " . $currentSeason . "<br>";
echo "<img src='" . $seasonImage . "' alt='Aastaeg'>";
?>
