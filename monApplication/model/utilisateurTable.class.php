<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {
	
	public static function getUserByLoginAndPass($login,$pass)
	{
		$em = dbconnection::getInstance()->getEntityManager();

		$userRepository = $em->getRepository('utilisateur');
		$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' => $pass)); // sha1($pass)

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
		$em = dbconnection::getInstance()->getEntityManager()->getConnection();
		
		$e = new utilisateur();
		$e->nom = $nom;
		$e->prenom = $prenom;
		$e->pseudo = $pseudo;
		$e->mdp = $mdp;

		$em->persit($e);

		$em->flush;

		return $e; 
	}
}

?>
