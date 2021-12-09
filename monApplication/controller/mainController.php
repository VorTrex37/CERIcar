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
		if (!empty($request[htmlspecialchars("param1")]) and !empty($request[htmlspecialchars("param2")])) {
			$context->param1 = htmlspecialchars($request["param1"]);
			$context->param2 = htmlspecialchars($request["param2"]);
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
	public static function resultTravel($request,$context)
	{
		$context->depart = $request[htmlspecialchars("depart")] ?? null;	
		$context->arrivee = $request[htmlspecialchars("arrivee")] ?? null;

		if ($context->arrivee && $context->depart) {
			$context->trip = trajetTable::getTrajet($context->depart, $context->arrivee);
			$context->travel = voyageTable::getVoyagesByTrajet($context->trip);

			if ($context->trip == null || $context->travel == null) {
				$context->status = 'info';
				$context->message = 'Aucun voyage disponible pour ce trajet';
			}
		} 

		if ($context->depart == null || $context->arrivee == null) {
			$context->status = 'warning';
			$context->message = "Veuillez saisir une ville de départ et une ville d\'arrivée";
		}
		
        return context::SUCCESS;
	}

	

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
