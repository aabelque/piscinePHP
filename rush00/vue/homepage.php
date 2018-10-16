<body>
<?php require_once('nav.php');?>
 <div id='panier'>
    <i class="material-icons" id="panier_img">local_grocery_store</i>
    <span><?=$count?></span>
  </div>
<div id="" class="container">
    <div id="cat_nav">
    	<a href="index.php">Toutes</a>
    <?php foreach ($categories as $categorie){ ?>
      <a href="index.php?cat=<?=$categorie['id']?>"><?=$categorie['nom']?></a>
    <?php } ?>
    </div>
    <div id="article_table">
	<?php $q = 0 ;
	while(isset($articles[$q])){
		for($i = 0; $i < 2 ; $i++){ ?>
			<div class="article-row">
				<?php for ($b = 0; $b < 3; $b++){ if(isset($articles[$q])){ ?>
				<div class="article-card">
					<img class ="article-img" src="./img/<?=$articles[$q]['img_name']?>">
					<div class="">
						<h3 class=""><?=$articles[$q]['nom']?></h3>
						<h4 class=""><?=$articles[$q]['prix']?>€</h4>
						<p class=""><?=$articles[$q]['description']?></p>
						<a href='index.php?add=<?=$articles[$q]['id']?>' class="btn">Ajouter au panier</a>
					</div>
				</div>
				<?php } $q++; } ?>
			</div>
		<?php } 
	}?>
    </div>
</div>
<script type="text/javascript">
	document.getElementById('panier').onclick = function(){
		window.location = "panier.php";
	};
</script>
<?php require_once('footer.php');?>
</body>
</html>
