<h1 class="mb-2 mt-2">Profil de <?php $_SESSION['identifiant'] ?></h1>

Identifiant : <?php echo $context->user->identifiant ?> 
<br>
Mot de Passe : <?php echo $context->user->pass ?> 
<br>
Prénom : <?php echo $context->user->nom ?> 
<br>
Nom : <?php echo $context->user->prenom ?> 
<br>