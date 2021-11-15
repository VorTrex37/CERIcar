
<form action="searchTravel" method="get">
 <p>Ville de départ : <input type="text" name="depart" /></p>
 <p>Ville d'arrivée : <input type="text" name="arrivee" /></p>
 <p><input type="submit" value="Rechercher"></p>
</form>


<?php if ($context->trip != NULL) { ?>
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
<?php } ?>
<br>