<!-- Résultat de la recherche de voyage de l'utilisateur -->
<?php if ($context->depart != NULL && $context->arrivee != NULL && $context->nbpersonne > 0) { ?>
    <?php if ($context->trip != NULL) { ?> 
        <h2>Résultat pour le voyage  <?php echo $context->depart ?> - <?php echo $context->arrivee ?> pour <?php echo $context->nbpersonne ?> personnes</h2>  
        <table class="table mt-3">
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
            <?php foreach ($context->trip as $travel){?> 
                <?php if ($travel->trajet->arrivee != $context->arrivee) {?>
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
                 <?php } else {?>
                    <table class="table mt-3">
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
            <?php } ?>
        </table>
    <?php }?>
<?php } ?>

<script type="text/javascript">
    window.afficheAlert("<?php echo $context->status ?>", "<?php echo $context->message ?>")
</script>
