<?php

if (!$conn = mysqli_connect("localhost","root","qwerty"))
	echo "Pas connecté <br>";
$sql = "drop database if exists organes ;";
if(!mysqli_query($conn, $sql))
	echo "drop if exists failed";
if(!mysqli_query($conn, "CREATE DATABASE organes CHARACTER SET 'utf8'"))
	echo "bdd pas crée <br>";
mysqli_close($conn);
$conn = mysqli_connect("localhost","root","qwerty","organes");
$sql = "
	CREATE TABLE users (
		id int PRIMARY KEY AUTO_INCREMENT,
		email varchar(150) NOT NULL,
		prenom varchar(30) NOT NULL,
		nom varchar(30) NOT NULL,
		mdp text NOT NULL,
		power int NOT NULL DEFAULT '0'
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	CREATE TABLE articles (
		id int PRIMARY KEY AUTO_INCREMENT,
		nom varchar(30) NOT NULL,
		prix int NOT NULL,
		img_name varchar(30) default null,
		description TEXT NULL DEFAULT NULL
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	CREATE TABLE categories(
		id int PRIMARY KEY AUTO_INCREMENT,
		nom varchar(30) not null
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	create table commandes( 
		id_user int not null, 
		id_article int not null,
		quantite int not null,
		onedate datetime not null,
		total int not null
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	create table architecture (
		id_article int not null,
		id_categorie int not null
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	INSERT INTO categories (id, nom) values ('1', 'humain');
	INSERT INTO categories (id, nom) values ('2', 'animal');
	INSERT INTO categories (id, nom) values ('3', 'os');
	INSERT INTO categories (id, nom) values ('4', 'muscles');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('1', 'rein', '60000', 'rein.jpg', 'Un rein tout neuf prêt à servir. Attention produit très demandé');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('2','oeil', '3000', 'oeil.jpg', 'On vous dit souvent que vous devriez vous acheter des yeux ? N\'hessitez plus, nos yeux sont les meilleurs du marché');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('3','poumons', '80000', 'poumons.jpg', 'Déja à bout de vos poumons ? Pas de problemes, on en a des tout beau tout neuf');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('4','chibre de cheval', '1000', 'chibre-cheval.jpg', 'Aucune idee de pourquoi vous voudriez ça...');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('5','femur', '80000', 'femur.jpg', 'Ca peut toujours servir, pour decorer. Mais vous ne lacheteriez pas a ce prix la...');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('6','phalange', '50000', 'phalange.jpg', 'Phalanges tres bon qualitée. 2 acheté le 3eme offert');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('7','chibre humain', '5000', 'chibre-humain.jpg', 'Vous avez perdu le votre ? On vous en fourni un sous 6jours ouvrés');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('8','cerveau', '1281547', 'cerveau.jpg', 'Cest toujours une bonne blague pour offrir a un ami qui en aurait besoin');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('9','coeur', '100000', 'coeur.jpg', 'Vous n\'en avez jamais eu ? Saissisez votre chance unique d\'en obtenir un');
	INSERT INTO articles (id, nom, prix, img_name, description) values ('10','implant mammaire', '200', 'implant.jpg', 'Vous avez des petits seins ? Vous avez désesperement envie d\'etre bonne ? Pour la modique sommme de 200 euros, on ne vous apellera plus jamais planche à pain');

	INSERT INTO architecture (id_article, id_categorie) values ('1', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('2', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('3', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('4', '2');
	INSERT INTO architecture (id_article, id_categorie) values ('5', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('5', '3');
	INSERT INTO architecture (id_article, id_categorie) values ('6', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('6', '3');
	INSERT INTO architecture (id_article, id_categorie) values ('7', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('8', '1');
	INSERT INTO architecture (id_article, id_categorie) values ('4', '9');
	INSERT INTO users (email, prenom, nom, mdp, power) values ('jacky@exemple.com', 'Azziz', 'bob', 'ac5bbf8b24d2db584f0dcc26e738ec41f2fabb971851fb17aa3475587df5836346ea422378bdd654dafca3fe62033135dbec46b63b27fb4d13da78ee0e6bbe8d', '1')";
if (!mysqli_multi_query($conn, $sql))
	echo " query failed <br>";
else
	echo "query sucess <br>";
mysqli_close($conn);
echo "<a href='index.php'>Retour a la maison</a>";
?>
