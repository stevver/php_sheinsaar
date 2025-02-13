<?php
// Nimi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['greet_name'])) {
        $name = trim($_POST['greet_name']);
        $greetName = ucfirst(strtolower($name));
    }

    // Punktidega tekst
    if (isset($_POST['dot_text'])) {
        $text = strtoupper($_POST['dot_text']);
        $dotOutput = '';
        for ($i = 0, $len = strlen($text); $i < $len; $i++) {
            $dotOutput .= $text[$i] . '.';
        }
    }

    // Ei ropendamist
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
        // Define forbidden words (example: noob; add other words as needed)
        $badWords = array("noob", "sitt", "imelik", "halb", "vastik", "rõve", "paha", "kurat");
        foreach ($badWords as $badWord) {
            $replacement = str_repeat('*', strlen($badWord));
            $message = str_ireplace($badWord, $replacement, $message);
        }
        $censoredMessage = $message;
    }

    // Email
    if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
        $firstName = trim($_POST['first_name']);
        $lastName  = trim($_POST['last_name']);
        $firstName = mb_strtolower($firstName, 'UTF-8');
        $lastName  = mb_strtolower($lastName, 'UTF-8');
        $accents  = array('ä', 'ö', 'ü', 'õ');
        $replaces = array('a', 'o', 'y', 'o');
        $firstName = str_replace($accents, $replaces, $firstName);
        $lastName  = str_replace($accents, $replaces, $lastName);
        $email = $firstName . '.' . $lastName . '@hkhk.edu.ee';
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Harjutus 09</title>
</head>
<body>
    <h2>Harjutus 09</h2>
    <form method="post" action="">
        <h3>1. Tervitus</h3>
        <label for="greet_name">Sisesta oma nimi:</label>
        <input type="text" id="greet_name" name="greet_name" required>
        <br><br>

        <h3>2. Tekst punktidega</h3>
        <label for="dot_text">Sisesta sõna (iga tähe järel lisatakse punkt):</label>
        <input type="text" id="dot_text" name="dot_text" required>
        <br><br>

        <h3>3. Sõnum (roppud sõnad asendatakse tärnidega)</h3>
        <label for="message">Sisesta oma sõnum:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea>
        <br><br>

        <h3>4. Emaili loomine</h3>
        <label for="first_name">Eesnimi:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br><br>
        <label for="last_name">Perenimi:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br><br>

        <input type="submit" value="Saada andmed">
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <hr>
        <?php if (!empty($greetName)): ?>
            <p><?php echo "Tere, " . htmlspecialchars($greetName) . "!"; ?></p>
        <?php endif; ?>

        <?php if (!empty($dotOutput)): ?>
            <p><?php echo htmlspecialchars($dotOutput); ?></p>
        <?php endif; ?>

        <?php if (isset($censoredMessage)): ?>
            <p><?php echo htmlspecialchars($censoredMessage); ?></p>
        <?php endif; ?>

        <?php if (isset($email)): ?>
            <p><?php echo htmlspecialchars($email); ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>