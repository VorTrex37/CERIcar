<div id="alertVoyage"></div>
<input type="hidden" name="action" value="formVoyage">
   <div class="row d-flex justify-content-center align-items-center h-100 m-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">Proposer un Voyage</h3>

            <div class="form-group mb-4">
              <label class="form-label" for="depart">Départ</label>
              <select id="depart" class="form-select form-select-sm" name="depart" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['depart'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
              </select>            
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="arrivee">Arrivée</label>
              <select id="arrivee" class="form-select form-select-sm" name="arrivee" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['arrivee'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
            </select>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="tarif">Tarif</label>
              <input type="number" id="tarif" class="form-control" min="0" name="tarif" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Nombre de place(s) </label>
              <input type="number" id="nbPlace" class="form-control" min="1" name="nbPlace" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Heure de départ</label>
              <input type="number" id="heureDepart" class="form-control" min="0" name="heureDepart" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label">Contraintes</label>
              <input type="text" id="contraintes" class="form-control" name="contraintes" required/>
            </div>
            <button class="btn btn-primary btn-lg btn-block m-2" id="formVoyage" type="submit" name="formVoyage">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
</form>
<script>
  $("#formVoyage").on("click", function() 
  {
    alertVoyage($("#depart").val(), $("#arrivee").val(), $("#tarif").val(), $("#nbPlace").val(), $("#heureDepart").val(), $("#contraintes").val())
  });
</script>