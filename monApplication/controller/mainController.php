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
			$context->param1 = $request[htmlspecialchars("param1")];
			$context->param2 = $request[htmlspecialchars("param2")]; // ?action=superTest&param1=Génail&param2=Incroyable
		} else {
			$context->event = "Veuillez spécifier tous les paramètres";
		}
		return context::SUCCESS;
	}

	public static function testTableModel($request,$context)
	{
		$context->user = utilisateurTable::getUserByLoginAndPass('User1', '0bc8658ea4e2f64af9d6890eace91a819f9f2046');
        $context->trip = trajetTable::getTrajet('Angers','Amiens');
        $context->travel = voyageTable::getVoyagesByTrajet(405);
        $context->reservation = reservationTable::getReservationByVoyage(674);
        $context->user_id = utilisateurTable::getUserById(2);

        return context::SUCCESS;
	}

	

	public static function index($request,$context){
		
		return context::SUCCESS;
	}


}
