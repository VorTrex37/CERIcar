<section method="POST" class="vh-100">
   <div class="row d-flex justify-content-center align-items-center h-100 m-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">S'inscrire</h3>

            <div class="form-group mb-4">
              <label class="form-label" for="nom">Nom</label>
              <input type="text" id="nom" class="form-control form-control-lg" name="nom"/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="prenom">Prénom</label>
              <input type="text" id="prenom" class="form-control form-control-lg" name="prenom"/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="pseudo">Pseudo</label>
              <input type="text" id="pseudo" class="form-control form-control-lg" name="pseudo"/>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="password">Mot de passe</label>
              <input type="password" id="password" class="form-control form-control-lg" name="password"/>
            </div>
            <button class="btn btn-primary btn-lg btn-block" id="inscription" type="submit" name="inscription">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
</section>
<script>
  $("#inscription").on("click", function() 
  {
    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var wrapper = document.createElement('div')
    wrapper.innerHTML = '<div class="alert alert-' + "<?php echo $context->status ?>" + ' alert-dismissible d-flex align-items-center m-2" role="alert">' + "<div id='info'>" + "<?php echo $context->message ?>" + "</div>" + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    alertPlaceholder.append(wrapper)
  });
</script>