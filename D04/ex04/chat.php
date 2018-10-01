<?php
session_start();

$path = "../htdocs/private/";
$file = $path."chat";

date_default_timezone_set('Europe/Paris');

if (file_exists($file))
{
	$unser = unserialize(file_get_contents($file));
	foreach ($unser as $elem)
	{
		echo "[".date("H:i", $elem['time'])."] ";
		echo "<b>".$elem['login']."</b>: ";
		echo $elem['msg']."<br />\n";
	}
}

?>
