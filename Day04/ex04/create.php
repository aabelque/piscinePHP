<?PHP
session_start();

function	get_data()
{
	if ($_POST['login'] != NULL && $_POST['passwd'] != NULL
		&& $_POST['submit'] === "OK")
	{
		$arr['login'] = $_POST['login'];
		$arr['passwd'] = hash('Whirlpool', $_POST['passwd']);
	}
	else
	{
		echo "ERROR\n";
		exit ();
	}
	return ($arr);
}

$path = "../htdocs/private/";
$file = $path."passwd";

$tab = get_data();

if (!file_exists($path))
{
	mkdir("../htdocs/");
	mkdir($path);
}
if (!file_exists($file))
{
	$unser[] = $tab;
	$ser[] = serialize($unser);
	file_put_contents($file, $ser);
}
else
{
	$unser = unserialize(file_get_contents($file));
	foreach ($unser as $elem)
	{
		foreach ($elem as $login=>$value)
		{
			if ($value == $tab['login'])
			{
				echo "ERROR\n";
				return ;
			}
		}
	}
	$unser[] = $tab;
	$ser = serialize($unser);
	file_put_contents($file, $ser);
}
header("Location: index.html");
echo "OK\n";
?>
