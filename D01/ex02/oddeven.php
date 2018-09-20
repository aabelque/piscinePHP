#!/usr/bin/php
<?php

$stdin = fopen('php://stdin', 'r'); 
while (!feof($stdin))
{	
	echo "Entrez un nombre: ";
	$nb = trim(fgets($stdin));
	if (!is_numeric($nb))
	{
		if (feof($stdin))
			echo "^D\n";
		else
			echo "'" . $nb . "' n'est pas un chiffre\n";
	}
	else
	{
		if ($nb % 2 == 0)
			echo "Le chiffre $nb est Pair\n";
		else
			echo "Le chiffre $nb est Impair\n";
	}
}
?>
