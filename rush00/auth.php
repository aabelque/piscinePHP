<?php

function	auth($login, $passwd)
{
	$path = "../htdocs/private/";
	$file = $path."passwd";

	$unser = unserialize(file_get_contents($file));
	$hash = hash('Whirlpool', $passwd);
    
	foreach ($unser as $key=>$value)
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
				$_SESSION['loggued_on_user'] = "";
				return (FALSE);
			}
		}
	}
	return (FALSE);
}

?>
