<?php

if (isset($_GET['action']) && $_GET['action'] == 'set')
{
	if (isset($_GET['name']) && isset($_GET['value']))
		setcookie($_GET['name'], $_GET['value']);
}
else if (isset($_GET['action']) && $_GET['action'] == 'get')
{
	if (isset($_GET['name']))
		echo $_COOKIE[$_GET['name']]."\n";
}
else if (isset($_GET['action']) && $_GET['action'] == 'del')
{
	if (isset($_GET['name']))
		setcookie($_GET['name']);
}

?>
