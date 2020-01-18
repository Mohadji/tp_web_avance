<?php 
	session_start();
	require_once('../Connexion_bd/bdd.php');

	if (!empty($_POST['login']) AND !empty($_POST['mdp'])) 
	{
		$login = htmlspecialchars($_POST['login']);
		$mdp = htmlspecialchars($_POST['mdp']);

		// $req = "SELECT * FROM user WHERE login ='$login' AND password='$mdp' AND statut ='1'";
		// $resultat = $bdd->query($req);
		// $row = $resultat->rowCount();

		$req = $pdo->prepare('SELECT * FROM user WHERE login_user=? AND password_user=? and statut=1');
		$req->execute(array($login,$mdp));

		$verification = $req->rowCount();
		if ($verification > 0) {
			
			$affichage = $req->fetch();

			//creation des variable session de controle 
			$_SESSION['id_user'] = $affichage['id_user'];
			$_SESSION['nom_user'] = $affichage['nom_user'];
			$_SESSION['prenom_user'] = $affichage['prenom_user'];
			$_SESSION['email_user'] = $affichage['email'];
			$_SESSION['login_user'] = $affichage['login_user'];

			// id du profil du user qui vien de se connecter dans la table user
			$_SESSION['id_profil'] = $affichage['id_profil'];

			$id_profil = $_SESSION['id_profil'];

			//**********récupération de la liste des actions du bloc congig*********************
			$sql = "SELECT g.id_group_action, g.libelle_group_action, a.id_action , a.libelle_Action,a.url_action FROM actions a , group_action g, profil_action p WHERE 
				a.id_action = p.id_action AND a.id_group_action = g.id_group_action AND p.id_profil = $id_profil
				AND g.bloc_menu = 'config'";

			$resultat_donfig = $pdo->query($sql);

			//creation du tableau contenant les session 
			$_SESSION['bloc_config'] = array();
			$i = 0;
			foreach ($resultat_donfig as $row_config) {
				$_SESSION['bloc_config'][$i] = array(
													"id_group_action" => $row_config['id_group_action'],
													"icon" => $row_config['icon'],
													"id_action" => $row_config['id_action'],
													"libelle_action" => $row_config['libelle_action'],
													"url_action" => $row_config['url_action'],
													"libelle_group_action" => $row_config['libelle_group_action'],
				);
				$i++;
			}


			//**********récupération de la liste des actions du bloc claire*********************
			$sql = "SELECT g.id_group_action, g.libelle_group_action, a.id_action , a.libelle_Action,a.url_action FROM actions a , group_action g, profil_action p WHERE 
				a.id_action = p.id_action AND a.id_group_action = g.id_group_action AND p.id_profil = $id_profil
				AND g.bloc_menu = 'claire'";

			$resultat_claire = $pdo->query($sql);

			//creation du tableau contenant les session 
			$_SESSION['bloc_config'] = array();
			$i = 0;
			foreach ($resultat_claire as $row_config) {
				$_SESSION['bloc_config'][$i] = array(
													"id_group_action" => $row_config['id_group_action'],
													"icon" => $row_config['icon'],
													"id_action" => $row_config['id_action'],
													"libelle_action" => $row_config['libelle_action'],
													"url_action" => $row_config['url_action'],
													"libelle_group_action" => $row_config['libelle_group_action'],
				);
				$i++;
			}

			header('location:../dashboard.php');
		}else{
			header("location:../index.php?error_compte=Compte ou Mot de passe incorrecte");	
		}
	}else {
		header("location:../index.php?erreur_champ=desoler les champs doivent etre renseigner...");
	}

 ?>