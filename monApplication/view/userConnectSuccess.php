<div id="alertConnexion"></div>
<input type="hidden" name="action" value="formConnexion">
  <div class="row d-flex justify-content-center align-items-center h-100 m-5">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-2-strong" style="border-radius: 1rem;">
        <div class="card-body p-5">

          <h3 class="mb-5 text-center">Connexion</h3>
          
          <div class="form-group mb-4">
            <label class="form-label" for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" class="form-control form-control-lg" name="pseudo" required/>
          </div>
          
          <div class="form-group mb-4">
            <label class="form-label" for="password">Mot de passe</label>
            <input type="password" id="password" class="form-control form-control-lg" name="password" required/>
          </div>
          
          <button class="btn btn-primary btn-lg btn-block" id="formConnexion" type="submit" name="formConnexion">Login</button>
          <a href="monApplication.php?action=userInscription">Pas encoire inscrit ?</a>
        </div>
      </div>
    </div>
  </div>

  <script>
$("#formConnexion").on("click", function() {
    alertConnexion($("#pseudo").val(), $("#password").val())
});
</script>