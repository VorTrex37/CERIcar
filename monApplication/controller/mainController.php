<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

	public static function superTest($request,$context)
	{
		if (!empty($request[htmlspecialchars("param1")]) and !empty($request[htmlspecialchars("param2")])) {
			$context->param1 = htmlspecialchars($request["param1"]);
			$context->param2 = htmlspecialchars($request["param2"]); // ?action=superTest&param1=Génail&param2=Incroyable
		} else {
			$context->event = "Veuillez spécifier tous les paramètres";
		}
		return context::SUCCESS;
	}

	public static function testTableModel($request,$context)
	{
		$context->user = utilisateurTable::getUserByLoginAndPass('User1', '0bc8658ea4e2f64af9d6890eace91a819f9f2046');
        $context->trip = trajetTable::getTrajet('Angers','Amiens');
        $context->travel_trip = trajetTable::getTrajet('Paris','Lyon');
        $context->travel = voyageTable::getVoyagesByTrajet($context->travel_trip);
        //$context->reservation = reservationTable::getReservationByVoyage();
        $context->user_id = utilisateurTable::getUserById(2);

        return context::SUCCESS;
	}
	
	public static function searchTravel($request,$context)
	{
		$context->depart = $request[htmlspecialchars("depart")] ?? null;	
		$context->arrivee = $request[htmlspecialchars("arrivee")] ?? null;

		$context->trip = null;
		if ($context->depart && $context->arrivee) {
			$context->trip = trajetTable::getTrajet($context->depart, $context->arrivee);
			$context->travel = voyageTable::getVoyagesByTrajet($context->trip);
		}

		// $context->trip = trajetTable::getTrajet($context->depart, $context->arrivee);
		// $context->travel = voyageTable::getVoyagesByTrajet($context->trip);

        return context::SUCCESS;
	}

	

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
