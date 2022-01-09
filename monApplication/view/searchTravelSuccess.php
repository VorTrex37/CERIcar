<!-- Formulaire de recherche -->
<h1 class="m-2">Recherchez un voyage</h1>
    <input type="hidden" name="action" value="searchTravel">
    <div class="d-flex flex-row" style="align-items: center;">
        <div class="p-2">
            <label class="form-label">Ville de départ</label>
            <select id="depart" class="form-select form-select-sm w-auto" name="depart" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['depart'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
            </select>
        </div>
        <div class="p-2">
            <label class="form-label">Ville d'arrivée</label>
            <select id="arrivee" class="form-select form-select-sm w-auto" name="arrivee" required>
                <option selected value="">Ouvrir le menu de sélection</option>
                <?php foreach ($context->cities['arrivee'] as $cities){?>
                    <option value='<?=$cities?>'><?=$cities?></option>
                <?php } ?>
            </select>
        </div>
        <div class="p-2">
            <label class="form-label">Nombre de personne(s) :</label>
            <input type="number" id="nbpersonne" class="form-control w-50" min="1" name="nbpersonne" value="1" required/>
        </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="true" id="correspondance" name="correspondance">
        <label class="form-check-label" for="correspondance">Correspondance</label>
    </div>
    <button id="searchTravel" class="btn btn-primary mb-5 m-2" style="padding: 5px 15px;">Rechercher</button>

<div id="resultTravel"></div>

<script>
$("#searchTravel").on("click", function() {
    console.log(($("#correspondance").is(":checked") ? $("#correspondance").val() : 'false'));
    resultTravel($("#depart").val(), $("#arrivee").val(), $("#nbpersonne").val(), ($("#correspondance").is(":checked") ? $("#correspondance").val() : 'false'))
});
</script>