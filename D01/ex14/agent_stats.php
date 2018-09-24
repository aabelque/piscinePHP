#!/usr/bin/php
<?php
if ($argc != 2)
	return ;
$tab = file('php://stdin');
array_splice($tab, 0, 1);
if ($argv[1] == "moyenne")
{
	$i = 0;
	foreach ($tab as $elem)
	{
		$res = explode(";", $elem);
		if ($res[1] != NULL && $res[2] != "moulinette")
		{
			$moy += $res[1];
			$i++;
		}
	}
	echo $moy / $i."\n";
}
else if ($argv[1] == "moyenne_user")
{
	sort($tab);
	foreach ($tab as $key => $value)
	{
		$tmp = explode(";", $value);
		$res[$tmp[0]][$key] = $value;
	}
	foreach ($res as $user)
	{
		$i = 0;
		$sum_us = 0;
		$moy = 0;
		foreach ($user as $elem)
		{
			$note = explode(";", $elem);
		}
	}
	print_r($note[0]);
	print_r($res[adam_e][1]);
	//echo $tab[1];
}
?>
