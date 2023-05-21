<?php

// Ouvrir une session
session_start();

// Si l'email n'est pas vide, enregistrer cet email dans un cookie avec la fonction setcookie()
if (isset($_POST['email']) && !empty($_POST['email'])) {
	setcookie('email', $_POST['email'], time() + 24 * 3600); // Expire dans 24h
}


// Si email ou password vide > redirection vers le formulaire avec un paramètre get "message" : "Vous devez remplir les 2 champs."
if (
	!isset($_POST['email'])
	|| empty($_POST['email'])
	|| !isset($_POST['mdp'])
	|| empty($_POST['mdp'])
) {
	header('location: connexion.php?message=Vous devez remplir les 2 champs.&type=danger');
	exit;
}

// Si email invalide > redirection vers le formulaire avec un paramètre get "message" : "Email invalide."
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	header('location: connexion.php?message=Email invalide.&type=danger');
	exit;
}


include('includes/db.php');



// On recherche l'utilisateur en base de données

$q = 'SELECT id_admin FROM admin WHERE email = :email AND password = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_POST['email'],
	'password' => hash('sha512', $_POST['mdp'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);


if (empty($results)) {
	header('location:adminportal.php?message=Identifiants incorrects.&type=danger');
	exit;
}





// Mettre le parametre email dans la session
$_SESSION['email'] = $_POST['email'];
$_SESSION['mdp'] = $_POST['mdp'];


// Redirection vers l'accueil
header('location: admin_index.php');
exit;