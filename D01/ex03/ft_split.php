#!/usr/bin/php
<?php

function	ft_split($str)
{
	$tab = explode(" ", $str);
	$result = [];
	foreach ($tab as $elem)
	{
		if ($elem != "")
			array_push($result, $elem);
	}
	sort($result);
	return $result;
}
?>
