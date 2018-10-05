#!/usr/bin/env php
<?php
$user = get_current_user();
$file = fopen("/var/run/utmpx", "r");
fseek($file, 1256);
date_default_timezone_set("Europe/Paris");
while (!feof($file))
{
	$utmpx = fread($file, 628);
	if (strlen($utmpx) == 628)
	{
		$utmpx = unpack("a256user/a4id/a32line/ipid/itype/itime", $utmpx);
		if ($utmpx['type'] == 7 && strcmp(trim($utmpx[user]), $user) == 0)
		{
			echo trim($utmpx['user'])."     ";
			echo trim($utmpx['line']) . " ";
			$time = date("M d H:i", $utmpx['time']);
			echo $time . " \n";
		}
	}
}
?>
