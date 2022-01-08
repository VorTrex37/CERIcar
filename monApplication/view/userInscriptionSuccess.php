<div id="alertInscription"></div>
<form method="POST" class="vh-100" id="formInscription">
   <div class="row d-flex justify-content-center align-items-center h-100 m-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">S'inscrire</h3>

            <div class="form-group mb-4">
              <label class="form-label" for="nom">Nom</label>
              <input type="text" id="nom" class="form-control form-control-lg" name="nom" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="prenom">Prénom</label>
              <input type="text" id="prenom" class="form-control form-control-lg" name="prenom" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="pseudo">Pseudo</label>
              <input type="text" id="pseudo" class="form-control form-control-lg" name="pseudo" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="password">Mot de passe</label>
              <input type="password" id="password" class="form-control form-control-lg" name="password" required/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="confpassword">Confirmation mot de passe</label>
              <input type="password" id="confpassword" class="form-control form-control-lg" name="confpassword" required/>
            </div>
            <button class="btn btn-primary btn-lg btn-block" id="inscription" type="submit" name="inscription">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
</form>
<script>
$("#inscription").on("click", function() {
    console.log($("#pseudo").val())
    resultTravel($("#nom").val(), $("#prenom").val(), $("#pseudo").val(), $("#password").val(), $("#confpassword").val())
});
</script>