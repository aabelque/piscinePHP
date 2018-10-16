#!/usr/bin/php
<?php

if ($argc != 2 || !file_exists($argv[1]))
	return ;
$str = file_get_contents($argv[1]);
$str = preg_replace_callback('/(<.* title=")(.*?)(")/i', function($match){ return ($match[1].strtoupper($match[2]).$match[3]); }, $str);
$str = preg_replace_callback('/(<a .*?>)((\s|\S)*?<)/i', function($match){ return ($match[1].strtoupper($match[2])); }, $str);
$str = preg_replace_callback('/(<\s*span\s*.*?>)((\s|\S)*?<)/i', function($match){ return ($match[1].strtoupper($match[2])); }, $str);
$str = preg_replace_callback('/(<\s*div\s*.*?>)((\s|\S)*?<)/i', function($match){ return ($match[1].strtoupper($match[2])); }, $str);
$str = preg_replace_callback('/(<\s*b\s*>)((\s|\S)*?<)/i', function($match){ return ($match[1].strtoupper($match[2])); }, $str);
$str = preg_replace_callback('/(<\s*h\d\s*>)((\s|\S)*?<)/i', function($match){ return ($match[1].strtoupper($match[2])); }, $str);
echo $str."\n";
?>
