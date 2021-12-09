<!-- Résultat de la recherche de voyage de l'utilisateur -->
<?php if ($context->depart != NULL && $context->arrivee != NULL) { ?>
    <?php if ($context->trip != NULL && $context->travel != NULL) { ?> 
        <h2>Résultat pour le voyage  <?php echo $context->depart ?> - <?php echo $context->arrivee ?></h2>  
        <table class="table mt-3">
            <thead>
                <tr>
                <th scope="col">Nombre de place</th>
                <th scope="col">Heure de départ</th>
                <th scope="col">Tarif</th>
                <th scope="col">Conducteur</th>
                <th scope="col">Contraintes</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($context->travel as $travel){ ?>
                    <tr>
                    <td><?php echo $travel->nbPlace ?></td>
                    <td><?php echo $travel->heureDepart . ' h'?></td>
                    <td><?php echo $travel->tarif . ' €' ?></td>
                    <td><?php echo $travel->conducteur->prenom . ' ' .  $travel->conducteur->nom?></td>
                    <td><?php echo $travel->contraintes ?></td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    <?php }?>
<?php } ?>

<script>
    afficheAlert('<?php echo $context->message ?>', '<?php echo $context->status ?>');
</script>