<h1 class="m-3">Profil de <?php echo $_SESSION['identifiant'] ?></h1>
<div class="card" style="width: 18rem; margin: 0 auto;">
    <img src="images/avatar.png" width="300" height="221">  
    <div class="card-body">
    <h5 class="card-title"><?php var_dump($context->user)  ?> <?php echo $context->user->nom ?> </h5>
  </div>
</div>
<h5 class="m-5">Mes réservations</h5>