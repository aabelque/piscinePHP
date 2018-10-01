<?php
session_start();

$path = "../htdocs/private/";
$file = $path."chat";

if ($_SESSION['loggued_on_user'] != "")
{
	if (isset($_POST['submit']) && $_POST['submit'] === "OK")
	{
		if (!file_exists($file))
		{
			$tab = array(array('login'=>$_SESSION['loggued_on_user'], 'time'=>time(), 'msg'=>$_POST['msg']));
			$ser[] = serialize($tab);
			file_put_contents($file, $ser);
		}
		else
		{
			$chat = fopen($file, "c+");
			flock($chat, LOCK_SH | LOCK_EX);
			$unser = unserialize(file_get_contents($file));
			$unser[] = array('login'=>$_SESSION['loggued_on_user'], 'time'=>time(), 'msg'=>$_POST['msg']);
			$ser = serialize($unser);
			file_put_contents($file, $ser);
			flock($chat, LOCK_UN);
		}
	}
?>
<HTML>
	<BODY>
		<HEAD> <script langage="javascript">top.frames['chat'].location = 'chat.php';</script> </HEAD>
		<FORM ACTION="" METHOD="post">
			<INPUT STYLE="height: 35px;" TYPE="text" NAME="msg" VALUE="" SIZE="200" />
			<INPUT TYPE="submit" NAME="submit" VALUE="OK" />
		</FORM>
	</BODY>
</HTML>
<?php
}
else
	echo "ERROR\n";
?>
