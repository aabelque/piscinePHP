<?php
require_once('model/conn.php');
$css="panier";
$commandes = [];
$total = 0;
if (isset($_SESSION['id']) && !auth($conn, $_SESSION['id']))
	header("location: logout.php");
if (isset($_POST['delme'])){
	deletefrom_table_withid($conn, $_SESSION['id'], 'users');
	header("location: logout.php");
}
if (isset($_POST['delete']) && count($_SESSION['cart']) != 0){
	$aid = htmlspecialchars($_POST['delete']);
	$joker == 0;
	foreach($_SESSION['cart'] as $key => $id){
		if (strcmp($aid, $id) == 0 && $joker == 0){
			unset($_SESSION['cart'][$key]);
			$joker = 1;
		}
	}
	header("Location: panier.php");
}
if (count($_SESSION['cart']) != 0){
	$cart = $_SESSION['cart'];
	$cart = array_count_values($cart);
	$fcart = [];
	$i = 0;
	foreach($cart as $id => $nb){
		$tmp = get_all_from_by($conn, 'articles', 'id', $id);
		$fcart[$i] = $tmp[0];
		$fcart[$i]['nb'] = $nb;
		$i++;
		$part = intval($nb) * intval($tmp[0]['prix']);
		$total += $part;
	}
}
if (isset($_POST['subcommand'])){
	if(!isset($_SESSION['id']))
	{
		header("Location: connect.php");
	}
	else{
		$date = date("Y-m-d H:i:s");
		foreach($cart as $id => $nb){
			add_commande_to_db($conn,$_SESSION['id'], $id, $nb,$date, $total);
		}
		unset($_SESSION['cart']);
		header("Location: panier.php");
	}
}

$header ="Organes index";
require_once("vue/header.php");
require_once('vue/page_panier.php');
