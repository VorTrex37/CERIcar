<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {
	
	public static function getUserByLoginAndPass($login,$pass)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass)));

		return $user; 
	}
	
	public static function getUserById($id)
	{
		$em = dbconnection::getInstance()->getEntityManager();

	  	$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('id' => $id));	
		
		return $user; 
	}
}

?>
