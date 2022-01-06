<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {
	
	public static function getUserByLoginAndPass($login,$pass)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => sha1($pass))); // sha1($pass)

		return $user; 
	}
	
	public static function getUserById($id)
	{
		$em = dbconnection::getInstance()->getEntityManager();

	  	$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('id' => $id));	
		
		return $user; 
	}

	public static function createUser($nom, $prenom, $pseudo, $mdp)
	{
		$em = dbconnection::getInstance()->getEntityManager();
		
		$e = new utilisateur();
		$e->identifiant = $pseudo;
		$e->pass = sha1($mdp);
		$e->prenom = $prenom;
		$e->nom = $nom;

		$em->persist($e);

		$em->flush();

		return $e; 
	}
}

?>
