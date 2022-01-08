<h1 class="m-3">Profil de <?php echo $_SESSION['identifiant'] ?></h1>
<div class="card" style="width: 18rem; margin: 0 auto;">
    <img src="images/avatar.png" width="300" height="221">  
    <div class="card-body">
    <h5 class="card-title" style="text-align: center;"><?php echo $context->user->prenom ?> <?php echo $context->user->nom ?> </h5>
  </div>
</div>
<h5 id="titreReserve" class="m-2">Mes réservations</h5>
<?php foreach ($context->trip as $travel){ ?> 
    <table id="reserve" class="table m-2">
        <thead>
            <tr>
            <th scope="col">Nombre de place</th>
            <th scope="col">Heure de départ</th>
            <th scope="col">Tarif</th>
            <th scope="col">Conducteur</th>
            <th scope="col">Contraintes</th>
            <th scope="col">Trajet</th>
            </tr>
        </thead>
        <tbody>
              <tr>
                  <td><?php echo $travel->nbPlace ?></td>
                  <td><?php echo $travel->heureDepart . ' h'?></td>
                  <td><?php echo $travel->tarif . ' €' ?></td>
                  <td><?php echo $travel->conducteur->prenom . ' ' .  $travel->conducteur->nom?></td>
                  <td><?php echo $travel->contraintes ?></td>
                  <td><?php echo $travel->trajet->depart . '-' . $travel->trajet->arrivee?></td>
              </tr>
        </tbody>
    </table>
<?php } ?>