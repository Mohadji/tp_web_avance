<?php 
	/******** FACULTE_DB_MANAGER ***********/

	//appelle a la page de connexion 
	include_once('Connexion_bd/bdd.php');

	// function d'insertion d'une faculter 
	function insert_faculte($nom_faculte, $email_faculte, $NumPhone_faculte, $nbSalle_faculte){
		//faire appele a la variable globale de connexion
		$pdo = $GLOBALS['connexion'];

        // die(var_dump($_POST));  

		try {
			
			//function qui debite la transaction
			$pdo->beginTransaction();

			//la requete d'insertion ...
			$insert = $pdo->prepare("INSERT into faculte (nom_fac, email_fac, tel_fac, nbr_salle) values (?,?,?,?)");
			$insert->execute(array($nom_faculte, $email_faculte, $NumPhone_faculte, $nbSalle_faculte));

			$pdo->commit();
			header('faculte_add.php?msg=Enregistrement effectuer ...');

		} catch (Exception $e) {
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			$msg = "Desoler l'Operation a echouer ! veuillez reprendre a nouveau ..."; 
			header("faculte_add.php?msg='$msg'");
			exit();
		}
	} // fin de la function insert_faculte


	//function de modification de la faculte
	function modification_faculte($id_faculte, $nom_faculte, $email_faculte, $NumPhone_faculte, $nbSalle_faculte){

		//variable globale
		$pdo = $GLOBALS['connexion'];

		// debit de la transaction 
		try {

			//debit de la modification 
			$pdo->beginTransaction;
			$pdo->exec("UPDATE faculte SET nom_fac='$nom_faculte' , email_fac='$email_faculte', tel_fac='$NumPhone_faculte', nbr_fac='$nbSalle_faculte' WHERE id_fac='$id_faculte'");

			$pdo->commit();
			return true;
			
		} catch (Exception $e) {
			
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			$msg = "Desoler l'Operation a echouer ! veuillez reprendre a nouveau ..."; 
			header("faculte_add.php?msg='$msg'");
			exit();
		}
	} // fin de la function modification_faculte

	// function d'activation d'une faculte
	function active_faculte($id_faculte){
		//variable globals
		$pdo = $GLOBALS['connexion'];

		try {

			//debit de la transaction
			$pdo->beginTransaction;

			$pdo->exec("UPDATE faculte SET statut_fac=1 WHERE id_fac='$id_faculte'"); 
			$pdo->commit();

			return true;
			
		} catch (Exception $e) {
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			$msg = "Desoler l'Operation a echouer ! veuillez reprendre a nouveau ..."; 
			header("faculte_add.php?msg='$msg'");
			exit();
		}
	} // fin de la function active_faculte


	// function de desactifivation d'une faculte
	function desactive_faculte($id_faculte){
		//variable globals
		$pdo->GLOBALS['connexion'];

		try {

			//debit de la transaction
			$pdo->beginTransaction;

			$pdo->exec("UPDATE faculte SET statut_fac=0 WHERE id_fac='$id_faculte'");
			$pdo->commit();

			return true;
			
		} catch (Exception $e) {
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			$msg = "Desoler l'Operation a echouer ! veuillez reprendre a nouveau ..."; 
			header("faculte_add.php?msg='$msg'");
			exit();
		}
	}
 ?>