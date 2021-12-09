<?php
// Inclusion de la classe trajet
require_once "trajet.class.php";

class trajetTable {

	public static function getTrajet($start, $finish)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$trajetRepository = $em->getRepository('trajet');
		$trajet = $trajetRepository->findOneBy(array('depart' => $start, 'arrivee' => $finish));
		
		return $trajet; 
	}

	public static function getCities() 
	{
		$em = dbconnection::getInstance()->getEntityManager() ;
		$trajetRepository = $em->getRepository('trajet');
		$cities = $trajetRepository->findAll();

		return [
			"depart" => array_unique(array_column($cities, 'depart')),
			'arrivee' => array_unique(array_column($cities, 'arrivee')),
		];
	}
}

?>
