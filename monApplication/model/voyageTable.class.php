<?php
// Inclusion de la classe voyage
require_once "voyage.class.php";

class voyageTable {

	public static function getVoyagesByTrajet($trip)
	{
  		$em = dbconnection::getInstance()->getEntityManager();

		$voyageRepository = $em->getRepository('voyage');
		$voyage = $voyageRepository->findBy(array('trajet' => $trip->id));
		
		return $voyage; 
	}
}

?>
