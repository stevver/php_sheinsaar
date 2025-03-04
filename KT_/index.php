<?php
$lubatudLehed = ['avaleht', 'works', 'skills', 'contact', 'admin'];

if (!empty($_GET['leht'])) {
    $leht = htmlspecialchars($_GET['leht']);
    
    if (in_array($leht, $lubatudLehed)) {
        $fail = $leht . '.php';
        
        if (is_file($fail)) {
            include($fail);
        } else {
            echo "<h2>Viga: Lehte '{$leht}' ei leitud!</h2>";
        }
    } else {
        echo "<h2>Viga: Valitud lehte ei eksisteeri!</h2>";
    }
} else {
    include('avaleht.php');
}
?>