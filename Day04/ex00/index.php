<?PHP
session_start();
if ($_GET['login'] != NULL && $_GET['passwd'] != NULL
	 && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>

<HTML><BODY>
<FORM ACTION="index.php" METHOD="get">
	Identifiant: <INPUT TYPE="text" NAME="login" VALUE="<?=$_SESSION['login'];?>" />
	<BR />
	Mot de passe: <INPUT TYPE="password" NAME="passwd" VALUE="<?=$_SESSION['passwd'];?>" />
	<INPUT TYPE="submit" NAME="submit" VALUE="OK" />
</FORM>
</BODY></HTML>
