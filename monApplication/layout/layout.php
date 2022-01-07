<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<!-- CSS -->
<link rel="stylesheet" href="css/app.css">

<title>CERIcar</title>
  
</head>

<body>
<!-- Barre de navigation -->
<nav class="navbar navbar-dark navbar-expand-lg bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="monApplication.php">CERIcar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="monApplication.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="monApplication.php?action=searchTravel">Recherche de voyage</a>
        </li>
      </ul>
    </div>
  </div>
</nav>




<!-- <h2>Super c'est ton appli ! </h2> -->
<?php if($context->getSessionAttribute('user_id')): ?>
<?php echo $context->getSessionAttribute('user_id')." est connecte"; ?>
<?php endif; ?>
  
<div class="container" id="page_maincontent">	
  <!-- Bandeau dynamique -->
  <div id="liveAlertPlaceholder"></div>
   <!-- Contenu de la vue -->
  <?php include($template_view); ?>
</div>
</body>
</html> 
<script type="text/javascript" src="js/app.js"></script>