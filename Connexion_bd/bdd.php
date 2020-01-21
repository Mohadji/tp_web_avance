<?php 

	try {
		
         $hostname  = 'localhost';
         $bd_name = "gschool";
         $user_name = "root";
         $password = "fakourou";

         $connStr = "mysql:host=".$hostname.";port=3306;dbname=".$bd_name;

         $pdo = new PDO($connStr,$user_name,$password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $pdo->query("SET NAMES 'utf8'");

         $GLOBALS['connexion'] = $pdo;

	} catch (Exception $e) {
		
		$msg = 'ERREUR PDO dans ' .$e->getFile(). 'L.' . $e->getLine() . ' : ' . $e->getMessage();
	}

 ?>