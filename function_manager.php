<?php 

	/* include de la page connexion a la base de donnee*/
	include_once('Connexion_bd/bdd.php');

	//*function de selection de toutes les actions dans la base de donnee
	function select_toute_actions(){
	    $pdo = $GLOBALS['connexion'];
	    $select = $pdo->query("SELECT g.id_groupe_action,g.icon,g.libelle_group_action, a.id_action, a.libelle_action, a.description_action
	                            FROM actions a, group_action g
	                            WHERE a.id_group_action=g.id_group_action
	                            order by libelle_group_action");
	    return $select;
	}//fin fonction select_action

 ?>