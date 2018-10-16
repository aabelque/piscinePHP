<?PHP

function	get_data()
{
	if ($_POST['login'] != NULL && $_POST['newpw'] != NULL
		&& $_POST['oldpw'] != NULL && $_POST['submit'] === "OK")
	{
		$arr['login'] = $_POST['login'];
		$arr['newpw'] = hash('Whirlpool', $_POST['newpw']);
		$arr['oldpw'] = hash('Whirlpool', $_POST['oldpw']);
	}
	else
	{
		echo "ERROR\n";
		exit();
	}
	return ($arr);
}

$path = "../htdocs/private/";
$file = $path."passwd";
$tab = get_data();

$unser = unserialize(file_get_contents($file));
$index = 0;

foreach ($unser as $login=>$value)
{
	if ($value['login'] == $tab['login'])
	{
		if ($value['passwd'] == $tab['oldpw'])
		{
			$unser["$login"]['passwd'] = $tab['newpw'];
			$index = 1;
		}
		else
		{
			echo "ERROR\n";
			return ;
		}
	}
}
if ($index == 1)
{
	$ser = serialize($unser);
	file_put_contents($file, $ser);
	echo "OK\n";
}
else
	echo "ERROR\n";

?>
