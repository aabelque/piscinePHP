<?php
require_once('model/conn.php');
require_once('model/function.php');

$error = array();
if ($_POST['prenom'] !== NULL && $_POST['nom'] !== NULL
	&& $_POST['mail'] !== NULL && $_POST['passwd'] !== NULL)
{
	if (!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)))
		$error[] = "Mail non valide: usage -> [jacky@exemple.com]";	
	$user = array();
	$user['prenom'] = mysqli_real_escape_string($conn, $_POST['prenom']);
	$user['nom'] = mysqli_real_escape_string($conn, $_POST['nom']);
	$user['mail'] = mysqli_real_escape_string($conn, $_POST['mail']);
	$user['passwd'] = hash("Whirlpool", $_POST['passwd']);
	if (strlen($user['prenom']) < 2 || strlen($user['prenom']) > 20)
		$error[] = "Prenom trop petit ou trop grand, veuillez saisir a nouveau votre prenom";
	if (strlen($user['nom']) < 2 || strlen($user['nom']) > 20)
		$error[] = "Nom trop petit ou trop grand, veuillez saisir a nouveau votre nom";
	if (strlen($_POST['passwd']) < 6)
		$error[] = "Mot de passe trop court, 6 caractere minimum";
	if (count($error) == 0)
	{
		if (get_user_by_mail($conn, $user['mail']) == NULL)
		{
			if (!add_user_to_db($user, $conn))
				$error[] = "Probleme d'ajout dans la base de donnee";
			else
			{
				$_SESSION["prenom"] = $user['prenom'];
				header("Location: connect.php");
			}
		}
		else
			$error[] = "Cet email est deja associe a un compte !";
	}
}
$header ="Inscription !";
require_once("vue/header.php");
require_once("vue/page_inscription.php");
?>
