<?php 
	session_start();
	//***page de control de session de l'utilisateur ****************
	 /*on verifie que les variables de session sont renseignées*/
    if(!isset($_SESSION['id_user']) || !isset($_SESSION['login_user']) || !isset($_SESSION['id_profil'])){
      	header('location:index.php?msg=Veuillez vous connecter !');
      	exit();
    }

 ?>