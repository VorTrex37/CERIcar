<?php
// Inclusion de la classe trajet
require_once "trajet.class.php";

class trajetTable {
	//Récupère tous les trajets disponibles
	public static function getTrajet($start, $finish)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$trajetRepository = $em->getRepository('trajet');
		$trajet = $trajetRepository->findOneBy(array('depart' => $start, 'arrivee' => $finish));
		
		return $trajet; 
	}

	// Retourne dans un tebleau toutes les villes de départ et d'arrivée
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

	public static function getCorrespondance($start, $finish, $nbPersonne)
	{
		$em = dbconnection::getInstance()->getEntityManager()->getConnection();

		$query = $em->prepare('select * from travelPossibility(\''. $start . '\',\''  . $finish . '\',\'' . $nbPersonne . '\')');

		$query->execute();

		$trajet = $query->fetchAll();

		$emv = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $emv->getRepository('voyage');

		$trip = [];
		
		foreach ($trajet as $travel) {
			$voyage = $voyageRepository->find($travel['v_id_voyage']);
			array_push($trip, $voyage);
		}
		return $trip;
	}
}

?>
