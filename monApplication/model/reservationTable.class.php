<?php
// Inclusion de la classe reservation
require_once "reservation.class.php";

class reservationTable {

	public static function getReservationByVoyage($travel)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyage' => $travel->id));	
		
		if ($reservation == false){
			echo 'Erreur sql : aucune réservation trouvée';
		}

		return $reservation; 
	}  
}

?>
