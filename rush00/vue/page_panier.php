<body>
<?php require_once('nav.php');?>

<div class="container" id="cpanier">
	<div class="article-row">
		<div class="col-2">
			<h3>image</h3>
		</div>
		<div class="col-2">
			<h3>nom</h3>
		</div>
		<div class="col-2">
			<h3>quantitée</h3>
		</div>
		<div class="col-2">
			<h3>prix</h3>
		</div>
		
	</div>
	<?php foreach($fcart as $item){?>
	<div class="article-row">
		<div class="col-2">
			<img src="./img/<?=$item['img_name']?>">
		</div>
		<div class="col-2">
			<h4><?=$item['nom']?></h4>
		</div>
		<div class="col-2">
			<h4><?=$item['nb']?></h4>
			<form action="panier.php" method="post">
				<button class="delbtn" type="submit" name="delete" value ="<?=$item['id']?>">Enlever 1</button>
			</form>
		</div>
		<div class="col-2">
			<h4><?=$item['prix']?></h4>
		</div>
		
	</div>
	<?php } ?>
	<div class="article-row">
		<div id="total">
			<h3>Total : <?=$total?>€</h3>
		</div>
		<form id="commandform" action="panier.php" method="POST">
			<button type="submit" name="subcommand" id="subcommand" >Passer la commande</button>
		</form>
	</div>
	<?php if (isset($_SESSION['id'])){?>
		<form id="delme" method="post" action="panier.php">
			<button type="submit" name="delme">Supprimer mon compte</button>
		</form>
	<?php } ?>
</div>
<?php require_once('footer.php');?>
</body>
</html>
