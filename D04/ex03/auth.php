<?php

function	auth($login, $passwd)
{
	$path = "../htdocs/private/";
	$file = $path."passwd";

	if (!file_exists($file))
		echo "File not found\n";
	
	$unser = unserialize(file_get_contents($file));
	$hash = hash('Whirlpool', $passwd);

	foreach ($unser as $login=>$value)
	{
		if ($value['login'] == $login)
		{
			if ($value['passwd'] == $hash)
			{
				$_SESSION['loggued_on_user'] = $login;
				return (TRUE);
			}
			else
			{
				$loggued_on_user = "";
				return (FALSE);
			}
		}
	}
	return (FALSE);
}

?>
