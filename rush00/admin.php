<?php
require_once('model/conn.php');
$css="admin";
if (!auth($conn, $_SESSION['id']))
	header("location: logout.php");
if (check_power($conn, $_SESSION['id']) != true)
	header("Location: index.php");


//////////// MODIFS ///////////////////////////
if (isset($_POST['modifuser'])){
	$id = intval($_POST['modifuser']);
	$data = [];
	foreach($_POST as $key => $value){
		$data[$key] = htmlspecialchars($value);
	}
	$data['passwd'] = hash('Whirlpool', $data['passwd']);
	$data['id'] = $id;
	update_user($data, $conn);
}
if (isset($_POST['modifcat'])){
	$id = intval($_POST['modifcat']);
	$nom = htmlspecialchars($_POST['nom']);
	update_categorie($nom, $conn, $id);
}
if (isset($_POST['modifart'])){
	$id = intval($_POST['modifart']);
	$data = [];
	$cid = [];
	foreach($_POST as $key => $value){
		if($key[0] == '#'){
			$cid[] = intval($value);
		}
		else
			$data[$key] = htmlspecialchars($value);
	}
	$data['prix'] = intval($data['prix']);
	$data['id'] = $id;
	update_article($data, $conn);
	deletefrom_architecture_what($conn, $id, 'id_article');
	foreach ($cid as $catid) {
		add_article_to_architecture($conn, $id, $catid);
	}
}
///////////// DELETES  ///////////////////////////////////////////
if (isset($_POST['deleteuser'])){
	$id = intval($_POST['deleteuser']);
	deletefrom_table_withid($conn, $id, 'users');
}
if (isset($_POST['deletecat'])){
	$id = intval($_POST['deletecat']);
	deletefrom_table_withid($conn, $id, 'categories');
	deletefrom_architecture_what($conn, $id, 'id_categorie');
}
if (isset($_POST['deleteart'])){
	$id = intval($_POST['deleteart']);
	deletefrom_table_withid($conn, $id, 'articles');
	deletefrom_architecture_what($conn, $id, 'id_article');
}
////////// AJOUTS //////////////////////////////////////////
if (isset($_POST['usersub'])){
	$data = [];
	foreach($_POST as $key => $value){
		if ($value == ""){
			header('location: admin.php?error=fill');
		}
		else
			$data[$key] = htmlspecialchars($value);
	}
	$data['passwd'] = hash('Whirlpool', $data['passwd']);
	if (!add_user_to_db($data, $conn))
		header('location: admin.php?error=bdd');
}
if (isset($_POST['catsub'])){
	$data = [];
	if ($_POST['nom'] == "") 
		header('location: admin.php?error=fill');
	$nom = htmlspecialchars($_POST['nom']);
	if (!add_categorie($conn, $nom))
		header('location: admin.php?error=bdd');
}
if (isset($_POST['artsub'])){
	$data = [];
	$cid = [];
	foreach($_POST as $key => $value){
		if ($value == ""){
			header('location: admin.php?error=fill');
		}
		else if($key[0] == '#'){
			$cid[] = intval($value);
		}
		else
			$data[$key] = htmlspecialchars($value);
	}
	$data['prix'] = intval($data['prix']);
	if (!add_article($data, $conn))
		header('location: admin.php?error=bdd');
	$article_id = get_article_id($conn, $data['nom'], $data['prix'], $data['desc']);
	foreach ($cid as $catid) {
		add_article_to_architecture($conn, $article_id, $catid);
	}
}
////////// AFFICHAGE   //////////////////////////////
if(isset($_GET['focus'])){
	$focus = $_GET['focus'];
	if ($focus == "users"){
		$users = get_all_from($conn, "users");	
	}
	if ($focus == "categories"){
		$categories = get_all_from($conn, 'categories');	
	}
	if ($focus == "articles"){
		$articles = get_all_from($conn, 'articles');
		$categories = get_all_from($conn, 'categories');
	}
	if ($focus == "command"){

		$commands = get_all_from($conn, 'commandes');
		$datestab = [];
		foreach ($commands as $key => $value) {
			if (in_array($value['onedate'], $datestab) == false)
				$datestab[] = $value['onedate'];
		}
	}

}
else{
	$focus = '';
}
/////// MESSAGES INFO 
if(isset($_GET['error']) ){
	$get = htmlspecialchars($_GET['error']);
	if ($get == 'fill')
		$error = "Remplissez tous les champs svp";
	if ($get == 'bdd')
		$error = "Erreur dans linsertion dans la bdd";
}

else
	$error = "";
$header ="Page admin";
require_once("vue/header.php");
require_once('vue/page_admin.php');