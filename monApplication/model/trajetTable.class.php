<?php
// Inclusion de la classe trajet
require_once "trajet.class.php";

class trajetTable {

	public static function getTrajet($start, $finish)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$trajetRepository = $em->getRepository('trajet');
		$trajet = $trajetRepository->findOneBy(array('depart' => $start, 'arrivee' => $finish));	
		
		if ($trajet == false){
			echo 'Erreur sql : aucun trajet trouvé';
		}
		
		return $trajet; 
	}
}

?>
