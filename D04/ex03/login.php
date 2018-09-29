<?php

session_start();

include 'auth.php';

if ($_GET['login'] != NULL && $_GET['passwd'] != NULL)
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
	if (auth($_SESSION['login'], $_SESSION['passwd']) == TRUE)
		echo "OK\n";
	else
		echo "ERROR\n";
}
else
{
	echo "ERROR\n";
	return ;
}

?>
