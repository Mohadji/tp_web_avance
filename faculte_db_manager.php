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

		// //variable globale
		$pdo = $GLOBALS['connexion'];

		// // debit de la transaction 
		try {

			//debit de la modification 
			$pdo->beginTransaction();
			$mdf = $pdo->prepare("UPDATE faculte SET nom_fac=? , email_fac=?, tel_fac=?, nbr_salle=? WHERE id_fac=?");
			$mdf->execute(array($nom_faculte,$email_faculte,$NumPhone_faculte,$nbSalle_faculte,$id_faculte));

			// die("cool");
			$pdo->commit();
			return true;
			
		} catch (Exception $e) {
			
			die("error");
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			return false;
		}
	} // fin de la function modification_faculte


	// function d'insertion d'une faculter  par le modal
	function insert_faculte_modal($nom_faculte, $email_faculte, $NumPhone_faculte, $nbSalle_faculte){
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
			header('faculte_liste_view.php?msg=Enregistrement effectuer ...');

		} catch (Exception $e) {
			// faire un retour sans aucune operation dans le cas ou rien ne marche
			$pdo->rollback();
			$msg = "Desoler l'Operation a echouer ! veuillez reprendre a nouveau ..."; 
			header("faculte_liste_view.php?msg='$msg'");
			exit();
		}
	} // fin de la function insert_faculte

 ?>