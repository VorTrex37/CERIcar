<?php

class mainController
{
	//Affiche le message hello world dans la vue
	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

    //Récupère les 2 variables dans l'URL et l'affiche sur la vue
    //Si une des 2 variables n'est pas spécifié affiche un message
	public static function superTest($request,$context)
	{
		if (!empty($request["param1"]) and !empty($request["param2"])) {
			$context->param1 = $request["param1"];
			$context->param2 = $request["param2"];
		} else {
			$context->event = "Veuillez spécifier tous les paramètres";
		}
		return context::SUCCESS;
	}

	//Test la récupération des données de la BDD
	public static function testTableModel($request,$context)
	{
		$context->user = utilisateurTable::getUserByLoginAndPass('User1', '0bc8658ea4e2f64af9d6890eace91a819f9f2046');
        $context->trip = trajetTable::getTrajet('Angers','Amiens');
        $context->travel_trip = trajetTable::getTrajet('Paris','Lyon');
        $context->travel = voyageTable::getVoyagesByTrajet($context->travel_trip);
        $context->user_id = utilisateurTable::getUserById(2);

        return context::SUCCESS;
	}

	//Récupère toutes les villes d'arrivée et de départ de la BDD
	public static function searchTravel($request,$context)
	{
		$context->cities = trajetTable::getCities();		

        return context::SUCCESS;
	}

	//Affiche les voyages disponibles 
	//Affiche un message si l'utilisateur ne spécifie pas une ville de départ ou d'arrvée
	//Affiche un message s'il n'y a pas de voyage pour le trajet demandé
	//Affiche un message si l'utilisateur envoie un nombre de personne égale ou inférieur à 0
	public static function resultTravel($request,$context)
	{
		$context->depart = $request["depart"] ?? null;	
		$context->arrivee = $request["arrivee"] ?? null;
		$context->nbpersonne = $request["nbpersonne"] ?? null;

		if ($context->arrivee && $context->depart && $context->nbpersonne) {
			$context->trip = trajetTable::getCorrespondance($context->depart, $context->arrivee, $context->nbpersonne);
			if ($context->trip == null) {
				$context->status = 'info';
				$context->message = 'Aucun voyage disponible pour ce trajet';
			}
		} 

		if ($context->depart == null || $context->arrivee == null || $context->nbpersonne == null) {
			$context->status = 'warning';
			$context->message = "Veuillez saisir une ville de départ, une ville d\'arrivée et un nombre de personne";
		}
		
        return context::SUCCESS;
	}

	public static function userConnect($request,$context)
	{
        return context::SUCCESS;
	}

	//Permet à l'utilisateur de s'incrire et donc d'ajouter en base un utilisateur
	public static function userInscription($request,$context)
	{
		$context->nom = $request["nom"] ?? null;
		$context->prenom = $request["prenom"] ?? null;
		$context->pseudo = $request["pseudo"] ?? null;
		$context->password = $request["password"] ?? null;
		$context->confpassword = $request["confpassword"] ?? null;

		if ($context->nom && $context->prenom && $context->pseudo && $context->password && $context->confpassword) {
			if ($context->password == $context->confpassword) {
				utilisateurTable::createUser($context->nom, $context->prenom, $context->pseudo, $context->password);
			}
		}
		

        return context::SUCCESS;
	}

	public static function proposeVoyage($request,$context)
	{
		$context->depart = $request["depart"] ?? null;
		$context->arrivee = $request["arrivee"] ?? null;
		$context->tarif = $request["tarif"] ?? null;
		$context->nbPlace = $request["nbPlace"] ?? null;
		$context->heureDepart = $request["heureDepart"] ?? null;
		$context->contraintes = $request["contraintes"] ?? null;
		$context->cities = trajetTable::getCities();		

		if ($context->depart && $context->arrivee && $context->tarif && $context->nbPlace && $context->heureDepart && $context->contraintes) {
				voyageTable::createVoyage($_SESSION['id'], $context->depart, $context->arrivee, $context->tarif, $context->nbPlace, $context->heureDepart, $context->contraintes);
		} else {
			$context->status = 'warning';
			$context->message = "Veuillez remplir tous les champs";
		}

		

        return context::SUCCESS;
	}

	//Permet à un utilisateur de se déconnecter
	public static function logout($request,$context){

		session_start();
		session_destroy();
		header('Location: monApplication.php');
		
		return context::SUCCESS;
	}

	public static function userProfil($request,$context){
		$context->user = utilisateurTable::getUserById($_SESSION['id']);
		$context->trip = reservationTable::getVoyageReserve($_SESSION['id']);
		return context::SUCCESS;
	}

	public static function reserveVoyage($request,$context){

		$context->voyage = unserialize($request["voyage"]);

		if (is_array($context->voyage)) {
			foreach ($context->voyage as $key => $travel) {
				reservationTable::reservationVoyage($travel->id, $_SESSION['id']);
				voyageTable::updateVoyage($travel->id, $travel->nbPlace);
			}
		} else {
			reservationTable::reservationVoyage($context->voyage->id, $_SESSION['id']);
			voyageTable::updateVoyage($context->voyage->id, $context->voyage->nbPlace);
		}

		$context->status = 'success';
		$context->message = "Le ou les voyage(s) ont été réservé avec succès";
		
		return context::SUCCESS;
	}

	public static function alertInscription($request,$context){

		$context->nom = $request["nom"] ?? null;
		$context->prenom = $request["prenom"] ?? null;
		$context->pseudo = $request["pseudo"]?? null;
		$context->password = $request["password"] ?? null;
		$context->confpassword = $request["confpassword"] ?? null;	

		if ($context->nom && $context->prenom && $context->pseudo && $context->password && $context->confpassword) {				
			if ($context->password != $context->confpassword) {
				$context->status = 'danger';
				$context->message = "Les mots de passe saisis ne sont pas identiques";
			} else {
				$context->status = 'success';
				$context->message = "Inscription réussi, vous pouvez dès maintenant vous connecter !";
				utilisateurTable::createUser($context->nom, $context->prenom, $context->pseudo, $context->password);
			}
		} else {
			$context->status = 'warning';
			$context->message = "Veuillez saisir tous les champs";
		}		

		return context::SUCCESS;
	}

	
	//Permet à l'utilisateur de se connecter et de concerver son id
	public static function alertConnexion($request,$context){

		$context->pseudo = $request["pseudo"] ?? null;
		$context->password = $request["password"] ?? null;
		if ($context->pseudo && $context->password) {
				$user = utilisateurTable::getUserByLoginAndPass($context->pseudo, $context->password);
				var_dump(empty($user));
				if (isset($user)) {
					$context->status = 'info';
					$context->message = "Vous n'avez pas encore de compte CERIcar";
				}
				$context->status = 'success';
				$context->message = "Connexion réussi";
				$context->user = $user;
				session_start();
				$_SESSION['id'] = $user->id;
				$_SESSION['identifiant'] = $user->identifiant;
		} else {
			$context->status = 'warning';
			$context->message = "Veuillez remplir tous les champs";
		}
		return context::SUCCESS;
	}

	public static function index($request,$context){
		
		return context::SUCCESS;
	}

}
