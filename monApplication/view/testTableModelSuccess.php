
Utilisateur connecté : 
<br>
Id : <?php echo $context->user->id ?> 
<br>
Identifiant : <?php echo $context->user->identifiant ?> 
<br>
Mot de Passe : <?php echo $context->user->pass ?> 
<br>
Prénom : <?php echo $context->user->nom ?> 
<br>
Nom : <?php echo $context->user->prenom ?> 
<br>
Avatar : <?php echo $context->user->avatar ?> 
<br>
<br>

Trajet : 
<br>
Id : <?php echo $context->trip->id ?>
<br>
Départ :  <?php echo $context->trip->depart ?>
<br>
Arrivée : <?php echo $context->trip->arrivee ?>
<br>
Distance : <?php echo $context->trip->distance ?>
<br>
<br>

Voyage :  
<?php foreach ($context->travel as $travel){ ?>
    <br>
    Id : <?php echo $travel->id ?>
    <br>
    Conducteur : <?php echo $travel->conducteur->prenom ?>
    <br>
    Trajet : <?php echo $travel->trajet->id ?>
    <br>
    Tarif : <?php echo $travel->tarif ?>
    <br>
    Nombre de place : <?php echo $travel->nbPlace ?>
    <br>
    Heure de départ : <?php echo $travel->heureDepart ?>
    <br>
    Contraintes : <?php echo $travel->contraintes ?>
    <br>
<?php } ?>
<br>

<!--Reservation :
<br> 
Id : <?php echo $context->reservation->id ?>
<br>
Voyage : <?php echo $context->reservation->voyage ?>
<br>
Voyageur : <?php echo $context->reservation->voyageur ?>
<br> -->

Utilisateur par id : 
<br>
Id : <?php echo $context->user_id->id ?> 
<br> 
Identifiant : <?php echo $context->user_id->identifiant ?> 
<br> 
Mot de passe : <?php echo $context->user_id->pass ?> 
<br> 
Prénom : <?php echo $context->user_id->prenom ?> 
<br> 
Nom : <?php echo $context->user_id->nom ?> 
<br>
Avatar : <?php echo $context->user_id->avatar ?>
<br>
