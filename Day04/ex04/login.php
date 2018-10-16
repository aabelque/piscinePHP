<?php

session_start();

include 'auth.php';

if ($_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['passwd'] = $_POST['passwd'];
	if (auth($_SESSION['login'], $_SESSION['passwd']) == TRUE)
    {
?>
    <IFRAME SRC="chat.php" NAME="text" WIDTH="100%" HEIGHT="550px"></IFRAME>
    <IFRAME SRC="speak.php" NAME="text" WIDTH="100%" HEIGHT="50px"></IFRAME>
<?php
    }
    else
    {
        echo "ERROR\n";
        return ;
    }
}

?>
