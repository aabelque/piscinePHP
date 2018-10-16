<?php

function auth($conn, $id){
	$sql = "SELECT * from users where id = '$id'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) == 0)
		return false;
	return true;
}
function update_article($article, $conn)
{
	$sql = "UPDATE articles SET nom = '" . $article['nom'] . "', prix = '" . $article['prix'] . "', img_name = '" . $article['image'] ."' WHERE id = '" . $article['id'] . "'";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function update_user($user, $conn)
{
	$sql = "UPDATE users SET nom = '" . $user['nom'] . "', prenom = '" .$user['prenom'] . "', mdp = '".$user['passwd'] . "', power = '" . $user['power'] ."', email = '" . $user['mail']. "' WHERE id = '" . $user['id'] . "'";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function update_categorie($nom, $conn, $id)
{
	$sql= "UPDATE categories SET nom = '$nom' WHERE id = '$id'";
	if (!($update = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function get_all_from($conn, $from){
	$sql = "SELECT * FROM " . $from;
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;
}

function get_all_from_by($conn, $from, $where, $value){
	$sql = "SELECT * FROM " . $from . " WHERE " . $where ." = '$value'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;	
}

function get_article_id($conn, $nom, $prix, $desc){
	$sql = "SELECT id from articles where nom = '$nom' and prix = '$prix' and description = '$desc';";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row['id'];	
}
function get_article_by_id($conn, $id){
	$sql = "SELECT * from articles where id = '$id';";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row;	
}
function get_user_by_id($conn, $id){
	$sql = "SELECT * from users where id = '$id';";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	return $row;	
}
function get_commande_by_date($conn, $date){
	$sql = "SELECT * FROM commandes WHERE onedate = '$date'";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $row;	
}
function get_user_by_mail($conn, $mail)
{
	$sql = "SELECT * FROM users WHERE email = '$mail'";
	if (!($res = mysqli_query($conn,$sql)))
		return false ;
	$row = mysqli_fetch_assoc($res);
	return $row;
}

function add_user_to_db($user, $conn)
{
	if (!isset($user['power']))
		$user['power'] = '0';
	 $sql = "INSERT INTO users (email, prenom, nom, mdp, power) VALUES ('" . $user['mail'] . "', '" . $user['prenom'] . "', '" . $user['nom'] . "', '" . $user['passwd'] . "', '" . $user['power'] . "')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function add_categorie($conn, $nom){
	$sql = "INSERT INTO categories (nom) values ('$nom')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function add_article($data, $conn){
	$sql = "INSERT INTO articles (nom, prix, img_name, description) values ('". $data['nom'] ."' ,'". $data['prix'] ."' ,'". $data['image'] ."' ,'". $data['desc'] ."')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function add_commande_to_db($conn, $id_user, $id_article, $nb, $date, $total)
{
	$sql = "INSERT INTO commandes (id_user, id_article, quantite, onedate, total) values ('$id_user','$id_article','$nb','$date','$total');";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}

function add_article_to_architecture($conn, $aid, $cid){
	$sql = "INSERT INTO architecture (id_article, id_categorie) values ('$aid', '$cid')";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function check_if_art_have_cat($conn, $idart, $idcat){
	$sql = "SELECT * FROM architecture where id_article = '$idart' and id_categorie =  '$idcat'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) == 0)
		return false;
	return true;
}

function check_power($conn, $id){
	$sql = "SELECT * from users where id = '$id' and power = '1'";
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) == 0)
		return false;
	return true;
}
function deletefrom_table_withid($conn, $id, $table){
	$sql = "DELETE FROM ". $table." where id = '$id'";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
function deletefrom_architecture_what($conn, $id, $what){
	$sql = "DELETE FROM architecture where ".$what." = '$id'";
	if (!($add = mysqli_query($conn, $sql)))
		return false;
	else
		return true;
}
?>
