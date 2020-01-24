<?php 
	/******** ANNAC_DB_MANAGER ***********/

	//appelle a la page de connexion 
	include_once('Connexion_bd/bdd.php');

	/*requette de recuperation de la variable message envoyer par get*/
    if (!isset($_GET['msg'])) { $msg="";} else{ $msg = $_GET['msg']; }


	/*function d'insertion d'une annee academique*/
	function insert_annac($lib_annac,$nbr_inscription)
	{
		/*recuperation de la variable de connexion*/
		$pdo = $GLOBALS['connexion'];

		try {

			/*debit de la transaction*/
			$pdo->beginTransaction();

			/*requette d'insertion*/
			$insert = $pdo->prepare("INSERT INTO annee_academique(lib_annac,nbr_inscription) VALUES(?,?)");
			$insert->execute(array($lib_annac,$nbr_inscription));

			/*faire un commit finale*/
			$pdo->commit();
			return true;
			
		} catch (Exception $e) {
			/*annulation de l'operation*/
			$pdo->rollback();
			return false;
		}
	} /*Fin de la function d'insertion*/


	/*debit de la function modification de l'annee academique*/
	function modification_annac($id_annac, $lib_annac, $nbr_inscription)
	{
		/*recuperation de la varianle globals*/
		$pdo = $GLOBALS['connexion'];

		try {

			/*debir de la transaction*/
			$pdo->beginTransaction();

			/*requete de modification de l'anne academique*/
			$mdf_annac = $pdo->prepare("UPDATE annee_academique SET lib_annac=? , nbr_inscription=? WHERE id_annac=?");
			$mdf_annac->execute(array($lib_annac,$nbr_inscription,$id_annac));

			/*cloture de la transaction*/
			$pdo->commit();
			return true;
			
		} catch (Exception $e) {
			/*annulation total de l'operation*/
			$pdo->rollback();
			return false;
		}
	}/*fin de la function modification */

	/*requette d'affichage de toute la lsite des annees academique*/
	$aff_annac = $pdo->query("SELECT * FROM annee_academique ORDER BY lib_annac");

 ?>