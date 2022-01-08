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

	public static function updateVoyage($voyage, $nbPlace)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$voyageRepository = $em->getRepository('voyage');
		$voyageReserve = $voyageRepository->find($voyage);
		
		$nbPlace = $nbPlace - 1;

		$voyageReserve->nbPlace = $nbPlace;

		$em->persist($voyageReserve);

		$em->flush();		
	} 

	public static function createVoyage($conducteur, $depart, $arrivee, $tarif, $nbPlace, $heureDepart, $contraintes)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$trajet= trajetTable::getTrajet($depart, $arrivee);
		$user = utilisateurTable::getUserById($conducteur);
		
		$e = new voyage();
		$e->conducteur = $user;
		$e->trajet = $trajet;
		$e->tarif = $tarif;
		$e->nbPlace = $nbPlace;
		$e->heureDepart = $heureDepart;
		$e->contraintes = $contraintes;

		$em->persist($e);

		$em->flush();

		return $e; 		
	} 
}
?>
