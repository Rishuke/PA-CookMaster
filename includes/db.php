<?php

try{
	$bdd = new PDO('mysql:host=localhost:3306;dbname=wicookin', 'root', '', 
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
	die('Connexion échouée. Erreur : ' . $e->getMessage());
}