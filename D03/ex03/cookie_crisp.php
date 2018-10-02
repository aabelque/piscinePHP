<?php

if ($_GET['action'] != NULL && $_GET['action'] == 'set')
{
	if ($_GET['name'] != NULL  && $_GET['value'] != NULL)
		setcookie($_GET['name'], $_GET['value'], time()+300);
}
else if ($_GET['action'] != NULL && $_GET['action'] == 'get')
{
	if ($_GET['name'] && $_COOKIE[$_GET['name']] != NULL)
		echo $_COOKIE[$_GET['name']]."\n";
}
else if ($_GET['action'] != NULL && $_GET['action'] == 'del')
{
	if ($_GET['name'])
		setcookie($_GET['name']);
}
else
	return ;
?>
