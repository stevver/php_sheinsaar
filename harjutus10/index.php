<?php
// Defineerime lubatud lehtede nimed
$lubatudLehed = ['avaleht', 'kontakt', 'portfoolio', 'kaart'];

// Kontrollime, kas GET parameeter 'leht' on määratud
if (!empty($_GET['leht'])) {
    // Turvaliseks muutmiseks kasutame htmlspecialchars
    $leht = htmlspecialchars($_GET['leht']);
    
    // Kontrollime, kas kasutaja sisend kuulub lubatud lehtede hulka
    if (in_array($leht, $lubatudLehed)) {
        // Moodustame failinime (nt "avaleht.php")
        $fail = $leht . '.php';
        
        // Kontrollime, kas faili eksisteerib
        if (is_file($fail)) {
            include($fail);
        } else {
            echo "<h2>Viga: Lehte '{$leht}' ei leitud!</h2>";
        }
    } else {
        echo "<h2>Viga: Valitud lehte ei eksisteeri!</h2>";
    }
} else {
    // Kui GET parameeter puudub, kuvatakse vaikimisi leht
    include('avaleht.php');
}
?>