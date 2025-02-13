<?php
// Tervitus: funktsioon, mis tagastab sõnumi "Tere kenake!"
function greet_user() {
    return "Tere kenake!";
}

// Liitu uudiskirjaga: funktsioon, mis genereerib uudiskirjaga liitumise vormi (vorm ja nupp)
function create_newsletter_form() {
    return '
        <form action="" method="POST">
            <div class="mb-3">
                <label for="newsletter_email" class="form-label">Sisesta oma email:</label>
                <input type="email" name="newsletter_email" id="newsletter_email" class="form-control" placeholder="Email aadress" required>
            </div>
            <button type="submit" class="btn btn-primary">Liitu uudiskirjaga</button>
        </form>
    ';
}

// Funktsioon kasutajanime muutmiseks väikesteks tähtedeks ja emaili genereerimiseks
function generate_username_email($username) {
    $lowercase_username = strtolower($username);
    return $lowercase_username . "@hkhk.edu.ee";
}

// Funktsioon, mis genereerib 7-kohalise juhusliku koodi (tähed ja numbrid läbisegamini)
function generate_random_code($length = 7) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Funktsioon, mis genereerib vahemiku kõigist täisarvudest
function generate_number_range($start, $end) {
    return range($start, $end);
}

// Funktsioon, mis genereerib vahemiku antud sammuga
function generate_number_range_with_step($start, $end, $step) {
    $range = [];
    for ($i = $start; $i <= $end; $i += $step) {
        $range[] = $i;
    }
    return $range;
}

// Funktsioon ristküliku pindala leidmiseks
function calculate_rectangle_area($length, $width) {
    return $length * $width;
}

// Funktsioon, mis kontrollib isikukoodi pikkust (peab olema 11 märki)
function validate_isikukood_length($isikukood) {
    return strlen($isikukood) === 11;
}

// Funktsioon, mis isikukoodist leiab soo ja sünnikuupäeva
function extract_gender_and_birthdate($isikukood) {
    if (!validate_isikukood_length($isikukood)) {
        return "Invalid isikukood";
    }
    $firstDigit = intval($isikukood[0]);
    if ($firstDigit == 1 || $firstDigit == 2) {
        $century = "18";
    } elseif ($firstDigit == 3 || $firstDigit == 4) {
        $century = "19";
    } elseif ($firstDigit == 5 || $firstDigit == 6) {
        $century = "20";
    } else {
        return "Invalid first digit in isikukood.";
    }
    $year  = substr($isikukood, 1, 2);
    $month = substr($isikukood, 3, 2);
    $day   = substr($isikukood, 5, 2);
    return [
        "gender"    => ($firstDigit % 2 == 1) ? "Mees" : "Naine",
        "birthdate" => "$day.$month.$century$year"
    ];
}

// Funktsioon juhusliku lause genereerimiseks (head mõtted)
function generate_random_sentence() {
    $alus    = ["Koer", "Kass", "Lind"];
    $oeldis  = ["jookseb", "hüppab", "laulab"];
    $sihitis = ["aedikus", "puu otsas", "toas"];
    return sprintf("%s %s %s.",
        $alus[array_rand($alus)],
        $oeldis[array_rand($oeldis)],
        $sihitis[array_rand($sihitis)]
    );
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Harjutus07</title>
</head>
<body>

<?php
// Tervitus
echo "<h2>" . greet_user() . "</h2>";

// Liitu uudiskirjaga - Bootstrap-stiilis vorm ja nupp
echo "<h3>Liitu uudiskirjaga</h3>";
// Laadime Bootstrap CSS ainult selle sektsiooni jaoks
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">';
echo create_newsletter_form();

// Kasutajanimi ja email vorm (plain HTML)
echo "<h3>Kasutajanimi ja email</h3>";
echo '<form method="POST">';
echo '  <label for="user_username">Sisesta kasutajanimi:</label><br>';
echo '  <input type="text" name="user_username" id="user_username" placeholder="Sisesta kasutajanimi" required><br>';
echo '  <input type="hidden" name="username_form" value="1">';
echo '  <button type="submit">Kinnita kasutajanimi</button>';
echo '</form>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username_form"]) && !empty($_POST["user_username"])) {
    $username_input    = $_POST["user_username"];
    $lowercase_username = strtolower($username_input);
    $email             = generate_username_email($username_input);
    $code              = generate_random_code();
    
    echo "<h4>Tulemus (Kasutajanimi ja email):</h4>";
    echo "<p>Kasutajanimi (väikesteks tähtedeks): " . htmlspecialchars($lowercase_username) . "</p>";
    echo "<p>Genereeritud email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Genereeritud 7-kohaline kood: " . htmlspecialchars($code) . "</p>";
}

// Arvude vahemiku valik
echo "<h3>Arvud</h3>";
echo "<h4>Vali arvude vahemik ja samm</h4>";
echo '<form method="POST">';
echo '  <label for="start">Algarv:</label><br>';
echo '  <input type="number" name="start" id="start" placeholder="Algarv" required><br>';
echo '  <label for="end">Lõpparv:</label><br>';
echo '  <input type="number" name="end" id="end" placeholder="Lõpparv" required><br>';
echo '  <label for="step">Samm:</label><br>';
echo '  <input type="number" name="step" id="step" placeholder="Samm"><br>';
echo '  <input type="hidden" name="numbers_form" value="1">';
echo '  <button type="submit">Genereeri vahemik</button>';
echo '</form>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["numbers_form"])) {
    $start = intval($_POST["start"]);
    $end   = intval($_POST["end"]);
    $step  = (isset($_POST["step"]) && trim($_POST["step"]) !== "") ? intval($_POST["step"]) : 1;
    if ($step < 1) {
        $step = 1;
    }
    if ($start > $end) {
        echo "<p style='color:red;'>Algarv peab olema väiksem või võrdne lõpparvuga.</p>";
    } else {
        if (isset($_POST["step"]) && trim($_POST["step"]) !== "" && $step > 1) {
            $range = generate_number_range_with_step($start, $end, $step);
            echo "<p>Arvude vahemik: " . implode(", ", $range) . "</p>";
        } else {
            $range = generate_number_range($start, $end);
            echo "<p>Arvude vahemik: " . implode(", ", $range) . "</p>";
        }
    }
}

// Ristküliku pindala vorm - kasutaja sisestatud mõõtmed
echo "<h3>Ristküliku pindala</h3>";
echo '<form method="POST">';
echo '  <label for="length">Sisesta pikkus:</label><br>';
echo '  <input type="number" name="length" id="length" placeholder="Pikkus" required><br>';
echo '  <label for="width">Sisesta laius:</label><br>';
echo '  <input type="number" name="width" id="width" placeholder="Laius" required><br>';
echo '  <input type="hidden" name="rectangle_form" value="1">';
echo '  <button type="submit">Arvuta pindala</button>';
echo '</form>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rectangle_form"])) {
    $length = trim($_POST["length"]);
    $width  = trim($_POST["width"]);
    if ($length !== "" && $width !== "") {
        $area = calculate_rectangle_area($length, $width);
        echo "<p>Ristküliku pindala ($length x $width): $area</p>";
    }
}

// Isikukoodi sisestamise vorm
echo "<h3>Isikukood</h3>";
echo '<form method="POST">';
echo '  <label for="isikukood">Sisesta isikukood:</label><br>';
echo '  <input type="text" name="isikukood" id="isikukood" placeholder="Sisesta isikukood" required><br>';
echo '  <input type="hidden" name="isikukood_form" value="1">';
echo '  <button type="submit">Kontrolli isikukoodi</button>';
echo '</form>';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["isikukood_form"])) {
    if (!empty($_POST["isikukood"])) {
        $isikukood = $_POST["isikukood"];
        if (validate_isikukood_length($isikukood)) {
            $result = extract_gender_and_birthdate($isikukood);
            if (is_array($result)) {
                echo "<h4>Isikukoodi tulemus:</h4>";
                echo "<p>Sugu: " . htmlspecialchars($result["gender"]) . "</p>";
                echo "<p>Sünniaeg: " . htmlspecialchars($result["birthdate"]) . "</p>";
            } else {
                echo "<p>" . htmlspecialchars($result) . "</p>";
            }
        } else {
            echo "<p style='color:red;'>Isikukoodi pikkus peab olema täpselt 11 märki.</p>";
        }
    }
}

// Head mõtted: juhusliku lause genereerimine
echo "<h3>Head mõtted</h3>";
echo "<p>Juhuslik lause: <strong>" . generate_random_sentence() . "</strong></p>";
?>

</body>
</html>