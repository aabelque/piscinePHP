<body>
<?php require_once('nav.php');?>
<div class="container" id="main_container">
	<div class="row" id="admincol">
		<div id="admincont">
			<a href="admin.php?focus=users">Utilisateurs</a>
			<a href="admin.php?focus=categories">Categories</a>
			<a href="admin.php?focus=articles">Articles</a>	
			<a href="admin.php?focus=command">Commandes</a>
		</div>	
	</div>
	<div class ="col-10" id="modif">
		<p><?=$error?></p>

		<div id="formcontainer">
			<?php if ($focus == 'command'){
				foreach($datestab as $date){
					$com_data = get_commande_by_date($conn, $date);?>
					<div class="row commande">
						<div>
							<?php $user_data = get_user_by_id($conn, $com_data[0]['id_user']); 
							foreach($com_data as $row){
								$res = get_article_by_id($conn, $row['id_article']);
								$result = $row['quantite'] . " fois un: " . $res['nom'] . " à " . $res['prix'] . "euros"; ?>
								<p><?=$result?></p>
								<br>
							<?php } $result = "Par ".$user_data['prenom'].' '.$user_data['nom']. " le ". $com_data[0]['onedate']." pour un total de ". $com_data[0]['total'].' euros';?>
						</div>
						<h4 class="auteur"><?=$result?></h4>
					</div>
			<?php }
			}?>
			<?php if ($focus == 'users'){?>
			<h3>Modif et Suppr:</h3>
			<?php foreach ($users as $user){ ?>
				<div class="row">
					<form id='formid' method="post" action="admin.php?focus=users">
						<label for="mail">Email</label>
						<input type="text" name="mail" value="<?=$user['email']?>">
						<br>
						<label for="prenom">Prenom</label>
						<input type="text" name="prenom" value="<?=$user['prenom']?>">
						<br>
						<label for="nom">Nom</label>
						<input type="text" name="nom" value="<?=$user['nom']?>">
						<br>
						<label for="passwd">Mot de passe</label>
						<input type="text" name="passwd">
						<br>
						<label for="power">Pouvoir</label>
						<input type="text" name="power" value="<?=$user['power']?>">
						<br>
					</form>
					<button form='formid' type="submit" name="modifuser" value="<?=$user['id']?>">Modifier</button>
				</div>

				<form method="post" action="admin.php?focus=users">
					<button type="submit" name="deleteuser" value="<?=$user['id']?>">Supprimer</button>
				</form>
				<br>
			<?php } ?>
			<h3>Ajout:</h3>
			<form method="post" action="admin.php?focus=users">
				<label for="mail">Email</label>
				<input type="text" name="mail">
				<br>
				<label for="prenom">Prenom</label>
				<input type="text" name="prenom">
				<br>
				<label for="nom">Nom</label>
				<input type="text" name="nom">
				<br>
				<label for="passwd">Mot de passe</label>
				<input type="text" name="passwd">
				<br>
				<label for="power">Pouvoir (0 ou 1)</label>
				<input type="text" name="power">
				<br>
				<input type="submit" name="usersub" value="ok">
			</form>
			<?php }?>
			<?php if ($focus == 'categories'){?>
			<h3>Modif et Suppr:</h3>
			<?php foreach ($categories as $cat){?>
				<div class="row">
					<form method="post" action="admin.php?focus=categories">
						<label>Nom</label>
						<input type="text" name="nom" value="<?=$cat['nom']?>">
						<button type="submit" name="modifcat" value="<?=$cat['id']?>">Modifier</button>
					</form>
				</div>
				<form method="post" action="admin.php?focus=categories">
					<button type="submit" name="deletecat" value="<?=$cat['id']?>">Supprimer</button>
				</form>
				<br>
			<?php } ?>
			<h3>Ajout:</h3>
			<form method="post" action="admin.php?focus=categories">
				<label>Nom</label>
				<input type="text" name="nom">
				<input type="submit" name="catsub" value="ok">
			</form>
			<?php }?>
			<?php if ($focus == 'articles'){?>
			<h3>Modif et Suppr:</h3>
			<?php foreach ($articles as $art){?>
				<div class="row">
					<form method="post" action="admin.php?focus=articles">
						<label>Nom</label>
						<input type="text" name="nom" value="<?=$art['nom']?>">
						<br>
						<label>Prix</label>
						<input type="text" name="prix" value="<?=$art['prix']?>">
						<br>
						<label>Image</label>
						<input type="text" name="image" value="<?=$art['img_name']?>">
						<br>
						<label>Description</label>
						<input type="text" name="desc" value="<?=$art['description']?>">
						<br><br>
						<p>Categories:</p>
						<?php foreach ($categories as $cat){
							if(check_if_art_have_cat($conn, $art['id'], $cat['id']) == true){$sel = "checked";}else {$sel = "";} ?>
							<input type="checkbox" name="<?='#'.$cat['nom']?>" value="<?=$cat['id']?>"<?=$sel?>>
							<label for="<?=$cat['nom']?>"><?=$cat['nom']?></label>
						<?php }?>
						<br>
						<button type="submit" name="modifart" value="<?=$art['id']?>">Modifier</button>
					</form>
				</div>
				<form method="post" action="admin.php?focus=articles">
					<button type="submit" name="deleteart" value="<?=$art['id']?>">Supprimer</button>
				</form>
			<?php } ?>
			<h3>Ajout:</h3>
			<form method="post" action="admin.php?focus=articles">
				<label>Nom</label>
				<input type="text" name="nom">
				<br>
				<label>Prix</label>
				<input type="text" name="prix">
				<br>
				<label>Image</label>
				<input type="text" name="image">
				<br>
				<label>Description</label>
				<input type="text" name="desc">
				<br><br>
				<p>Categories:</p>
				<?php foreach ($categories as $cat){?>
					<input type="checkbox" name="<?='#'.$cat['nom']?>" value="<?=$cat['id']?>">
					<label for="<?=$cat['nom']?>"><?=$cat['nom']?></label>
				<?php }?>
				<br>
				<input type="submit" name="artsub" value="ok">
			</form>
			<?php }?>
		</div>
	</div>
</div>
<?php require_once('footer.php');?>
</body>
</html>