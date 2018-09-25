#!/usr/bin/php
<?php

if ($argc == 2)
{
	$tab = explode(" ", $argv[1]);
	$res1 = preg_match('/^([Ll])undi$|^([Mm])ardi$|^([Mm])ercredi$|^([Jj])eudi$|^([Vv])endredi$|^([Ss])amedi$|^([Dd])imanche$/', $tab[0]);
	$res2 = preg_match('/(^[0]?[1-9]{1}$)|(^[1-2]{1}[0-9]$)|(^[3]{1}[0-1]$)/' , $tab[1]);
	$res3 = preg_match('/^([Jj])anvier$|^([Ff])evrier$|^([Mm])ars$|^([Aa])vril$|^([Mm])ai$|^([Jj])uin$|^([Jj])uillet$|^([Aa])out$|^([Ss])eptembre$|^([Oo])ctobre$|^([Nn])ovembre$|^([Dd])ecembre$/', $tab[2]);
	$res4 = preg_match('/(^[1][9][7-9][0-9]$)|(^[2][0]([0-2][0-9]|[3][0-8])$)/' , $tab[3]);
	$res5 = preg_match('/((^[0-1][0-9])|(^[2][0-3])):([0-5][0-9]):([0-5][0-9])$/' , $tab[4]);
	$month = array('janvier' => 01, 'fevrier' => 02, 'mars' => 03, 'avril' => 04, 'mai' => 05, 'juin' => 06, 'juillet' => 07, 'aout' => 08, 'septembre' => 09, 'octobre' => 10 , 'novembre' => 11, 'decembre' => 12);
	if ($res1 != 0 && $res2 != 0 && $res3 != 0 && $res4 != 0 && $res5 != 0)
	{
		$hour = explode(":", $tab[4]);
		date_default_timezone_set("Europe/Paris");
		$time = mktime($hour[0], $hour[1], $hour[2], $month[strtolower($tab[2])], $tab[1], $tab[3], 0);
		echo $time."\n";
	}
	else
		echo "Wrong Format\n";
}
else
	return ;
?>
