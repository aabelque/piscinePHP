<?php
require_once('model/conn.php');
$error = array();
if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	if (isset($_POST['mail']) && $_POST['mail'] != NULL
		&& isset($_POST['passwd']) && $_POST['passwd'] != NULL)
	{
		$hash = hash('Whirlpool', $_POST['passwd']);
		if (!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)))
			$error[] = "Mail non valide: usage -> [Jacky@exemple.com]";
		if (!($user = get_user_by_mail($conn, mysqli_real_escape_string($conn, $_POST['mail']))))
			$error[] = "Le mail saisi n'existe pas";
		if (strcmp($hash, $user['mdp']) != 0)
			$error[] = "Mot de passe invalide";
		if (count($error) == 0)
		{
			$_SESSION['mail'] = mysqli_real_escape_string($conn, $_POST['mail']);
			$_SESSION['prenom'] = $user['prenom'];
			$_SESSION['nom'] = $user['nom'];
			$_SESSION["id"] = $user['id'];
			header("Location: index.php");
		}
	}
	else
		$error[] = "Veuillez remplir tout les champs";
}

$header ="Connexion !";
require_once("vue/header.php");
require_once('vue/page_connect.php');
?>
