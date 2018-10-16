<?php
require_once('model/conn.php');
$css = "homepage";
if (isset($_SESSION['id']) && !auth($conn, $_SESSION['id']))
	header("location: logout.php");
if (!isset($_SESSION['cart']))
	$_SESSION['cart'] = [];

$categories = get_all_from($conn, 'categories');

if (isset($_GET['cat'])){
	$catid = htmlspecialchars($_GET['cat']);
	$articles_id = get_all_from_by($conn, 'architecture', 'id_categorie', $catid);
	$articles = [];
	foreach($articles_id as $key => $aid){
		$tmp = get_all_from_by($conn, 'articles', 'id', $aid['id_article']);
		$articles[$key] = $tmp[0];

	}
}
else{
	$catid = '0';
	$articles = get_all_from($conn, 'articles');	
}

if(isset($_GET['add'])){
	$add =htmlspecialchars($_GET['add']);
	$_SESSION['cart'][] = $add;
}
$count = count($_SESSION['cart']);
$header ="Organes index";
require_once("vue/header.php");
require_once('vue/homepage.php');
?>
