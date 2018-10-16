<body>
<?php require_once('nav.php');?>
<div class="container">
<form method="POST" action="inscription.php">
	<p>Prenom :</p>
	<input class="input" type="text" name="prenom" value="<?=$_POST["prenom"]?>">
	<p>Nom :</p>
	<input class="input" type="text" name="nom" value="<?=$_POST["nom"]?>">
	<p>Mail :</p>
	<input class="input" type="mail" name="mail" value="<?=$_POST["mail"]?>">
	<p>Mot de passe :</p>
	<input class="input" type="password" name="passwd">
	<button type="submit" name="submit" value="OK" >SIGN UP</button>
</form>
</div>
<?php
if (count($error) != 0)
{
	foreach($error as $elem)
		echo "<p>$elem</p>";
}
?>
<?php require_once('footer.php');?>
</body>
</html>
