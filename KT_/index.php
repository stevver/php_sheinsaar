<?php
// Define allowed pages
$lubatudLehed = ['avaleht', 'works', 'skills', 'contact', 'admin'];

// Check if 'page' parameter is set
if (!empty($_GET['page'])) {
    // Sanitize input
    $page = htmlspecialchars($_GET['page']);
    
    // Check if input is in allowed pages
    if (in_array($page, $lubatudLehed)) {
        // Construct filename
        $fail = $page . '.php';
        
        // Check if file exists
        if (is_file($fail)) {
            include($fail);
        } else {
            echo "<h2>Viga: Lehte '{$page}' ei leitud!</h2>";
        }
    } else {
        echo "<h2>Viga: Valitud lehte ei eksisteeri!</h2>";
    }
} else {
    // Show default page
    include('avaleht.php');
}
?>