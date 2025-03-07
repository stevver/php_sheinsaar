<!--Stever Heinsaar
07.03.2025 -->

<menu>
    <a href="index.php?leht=avaleht">Avaleht</a> |
    <a href="index.php?leht=kontakt">Kontakt</a> |
    <a href="index.php?leht=portfoolio">Portfoolio</a> |
    <a href="index.php?leht=kaart">Kaart</a>
</menu>

<?php
if(!empty($_GET['leht'])){
	$leht = htmlspecialchars($_GET['leht']);
	$lubatud = array('avaleht','portfoolio','kaart','kontakt');
	$kontroll = in_array($leht, $lubatud);
	if($kontroll==true){
		include($leht.'.php');
	} else {
		echo '404: Valitud lehte ei eksisteeri';
	}
} else
{
    include('avaleht.php');
}


?>

