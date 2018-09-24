#!/usr/bin/php
<?php

function ft_split($str)
{
    $tab = explode(" ", $str);
    $result = array();
    foreach ($tab as $elem)
    {
        if ($elem != "")
            array_push($result, $elem);
    }
    sort($result);
    return ($result);
}

if ($argc > 1)
{
	$res = array();

	foreach($argv as $arg)
	{
    	if ($arg != $argv[0])
    	{
        	$tab = ft_split($arg);
        	$res = array_merge($res, $tab);
    	}
	}

	foreach ($res as $elem)
	{
		if (is_numeric($elem) == TRUE)
			$num[] = $elem;
	}
	if ($num != NULL)
		sort($num, SORT_STRING);

	foreach ($res as $elem)
	{
		if (ctype_alpha($elem) == TRUE)
			$alpha[] = $elem;
	}
	if ($alpha != NULL)
		sort($alpha, SORT_NATURAL | SORT_FLAG_CASE);

	foreach ($res as $elem)
	{
		if (is_numeric($elem) == FALSE && ctype_alpha($elem) == FALSE)
			$ascii[] = $elem;
	}
	if ($ascii != NULL)
		sort($ascii);

	if ($alpha != NULL)
	{
		foreach ($alpha as $arg)
    		echo $arg."\n";
	}

	if ($num != NULL)
	{
		foreach ($num as $arg)
			echo $arg."\n";
	}

	if ($ascii != NULL)
	{
		foreach ($ascii as $arg)
			echo $arg."\n";
	}
}
else
	echo "\n";
?>
