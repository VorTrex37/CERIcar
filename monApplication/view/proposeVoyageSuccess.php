<form method="POST" class="vh-100" id="formInscription">
   <div class="row d-flex justify-content-center align-items-center h-100 m-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">Proposer un Voyage</h3>

            <div class="form-group mb-4">
              <label class="form-label" for="nom">Départ</label>
              <select id="depart" class="form-select form-select-sm" name="depart" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['depart'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
              </select>            
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="prenom">Arrivée</label>
              <select id="arrivee" class="form-select form-select-sm" name="arrivee" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['arrivee'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
            </select>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="pseudo">Tarif</label>
              <input type="number" id="tarif" class="form-control" min="0" name="tarif" value="0" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Nombre de place(s) </label>
              <input type="number" id="nbPlace" class="form-control" min="1" name="nbPlace" value="1" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Heure de départ</label>
              <input type="number" id="heureDepart" class="form-control" min="0" name="heureDepart" value="0" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Contraintes</label>
              <input type="text" id="contraintes" class="form-control" name="contraintes" required/>
            </div>
            <button class="btn btn-primary btn-lg btn-block m-2" id="voyage" type="submit" name="voyage">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
</form>
<script>
  $("#voyage").on("click", function() 
  {
    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var wrapper = document.createElement('div')
    wrapper.innerHTML = '<div class="alert alert-' + "<?php echo $context->status ?>" + ' alert-dismissible d-flex align-items-center m-2" role="alert">' + "<div id='info'>" + "<?php echo $context->message ?>" + "</div>" + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    alertPlaceholder.append(wrapper)
  });
</script>