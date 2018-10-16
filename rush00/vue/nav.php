<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="panier.php">Mon panier</a>
  <?php if(!isset($_SESSION['id'])){?>
  <a href="connect.php">Se connecter</a>
  <a href="inscription.php">Inscription</a>
  <?php } else if (check_power($conn, $_SESSION['id']) == true){?>
  <a href="admin.php">Admin</a>
  <?php } ?>
  <?php if(isset($_SESSION['id'])){ ?>
  <a href="logout.php">Deconnexion</a>
  <?php } ?>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
