<?php 

	/* include de la page connexion a la base de donnee*/
	include_once('Connexion_bd/bdd.php');

	//*function de selection de toutes les actions dans la base de donnee
	function select_toute_actions(){
	    $pdo = $GLOBALS['connexion'];
	    $affichage = $pdo->query("SELECT a.id_action as id_action,libelle_action,description_action, g.id_group_action as 								id_group_action,libelle_group_action FROM actions a, group_action g WHERE a.id_group_action = 							g.id_group_action ORDER BY libelle_group_action");
	    return $affichage;
	}//fin fonction select_action

	

 ?>