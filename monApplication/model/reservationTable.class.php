<?php
// Inclusion de la classe reservation
require_once "reservation.class.php";

class reservationTable {

	public static function getReservationByVoyage($travel)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyage' => $travel->id));

		return $reservation; 
	}  

	public static function reservationVoyage($voyage, $user)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		
		$e = new reservation();
		$e->voyage = $voyage;
		$e->voyageur = $user;

		$em->persist($e);

		$em->flush();

		return $e;
	}   

	public static function getVoyageReserve($user)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$reservationRepository = $em->getRepository('reservation');
		$reservation = $reservationRepository->findBy(array('voyageur' => $user));

		$emv = dbconnection::getInstance()->getEntityManager() ;
		$voyageRepository = $emv->getRepository('voyage');

		$trip = [];

		foreach ($reservation as $booking) {
			$voyage = $voyageRepository->find($booking->voyage->id);
			array_push($trip, $voyage);
		}

		return $trip; 
	}
}

?>
