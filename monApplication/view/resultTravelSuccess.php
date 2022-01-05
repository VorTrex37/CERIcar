<!-- Résultat de la recherche de voyage de l'utilisateur -->
<?php if ($context->depart != NULL && $context->arrivee != NULL && $context->nbpersonne > 0) { ?>
    <?php if ($context->trip != NULL) { ?> 
        <h2>Résultat pour le voyage  <?php echo $context->depart ?> - <?php echo $context->arrivee ?> pour <?php echo $context->nbpersonne ?> personnes</h2>  
        <?php foreach ($context->trip as $travel){?> 
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
                <?php if (is_array($travel)) { ?>
                    <?php foreach ($travel as $test){?> 
                        <td><?php echo $test->nbPlace ?></td>
                        <td><?php echo $test->heureDepart . ' h'?></td>
                        <td><?php echo $test->tarif . ' €' ?></td>
                        <td><?php echo $test->conducteur->prenom . ' ' .  $test->conducteur->nom?></td>
                        <td><?php echo $test->contraintes ?></td>
                        <td><?php echo $test->trajet->depart . '-' . $test->trajet->arrivee?></td>
                    <?php } ?>
                    <?php }else { ?>
                            <td><?php echo $travel->nbPlace ?></td>
                            <td><?php echo $travel->heureDepart . ' h'?></td>
                            <td><?php echo $travel->tarif . ' €' ?></td>
                            <td><?php echo $travel->conducteur->prenom . ' ' .  $travel->conducteur->nom?></td>
                            <td><?php echo $travel->contraintes ?></td>
                            <td><?php echo $travel->trajet->depart . '-' . $travel->trajet->arrivee?></td>
                    <?php } ?> 
                    </tr>
                </tbody>
            </table>
        <?php } ?>
    <?php }?>
<?php } ?>

<script type="text/javascript">
    window.afficheAlert("<?php echo $context->status ?>", "<?php echo $context->message ?>")
</script>
