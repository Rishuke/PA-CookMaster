<?php

if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type'])){
    echo '<div class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message']) . '</div>';
}

// Si l'email n'est pas vide, enregistrer cet email dans un cookie avec la fonction setcookie()
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600); // Expire dans 24h
}

// Si email ou password vide > redirection vers le formulaire avec un paramètre get "message" : "Vous devez remplir les 2 champs."
if(
	!isset($_POST['email'])
	|| empty($_POST['email'])
	|| !isset($_POST['mdp'])
	|| empty($_POST['mdp'])
){
	header('location: inscription.php?message=Vous devez remplir tous les champs.&type=danger');
	exit;
}
// Si email invalide > redirection vers le formulaire avec un paramètre get "message" : "Email invalide."
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('Location: inscription.php?message=emailErr.&type=danger');
	exit;
}

// Si le mdp fait moins de 6 caractères ou plus de 12 > redirection vers le formulaire avec un paramètre get "message" : "Le mot de passe doit comporter entre 6 et 12 caractères."


if(strlen($_POST['mdp']) < 6 || strlen($_POST['mdp']) > 12){
	header('Location: inscription.php?message=passwordErr.&type=danger');
	exit;
}

// Connexion à la BDD
try{
	$bdd = new PDO('mysql:host=localhost:3306;dbname=wicookin.fr', 'root', 'root', 
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
	die('Connexion échouée. Erreur : ' . $e->getMessage());
}


// Vérifier que l'email n'est pas déjà utilisé

// Sélectionner l'id des utilisateurs ayant le même email
$q = 'SELECT num_mem FROM membre WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute(['email' => $_POST['email']]);

// Récupérer tous les résultats
$results = $req->fetchAll();

if(!empty($results)){
	// Un ou +s utilisateurs ont l'email envoyé : redirection vers le formulaire
	header('Location: inscription.php?message=alreadyEmail&type=danger');
}

// Vérification de l'image de profil
if($_FILES['image']['error'] != 4){ // un fichier a été envoyé
	
	// vérifier que le fichier est de type jpg, png ou gif (utiliser le type du fichier), si non : redirection
	$acceptable = [
		'image/gif',
		'image/png',
		'image/jpeg'
	];
	
	if(!in_array($_FILES['image']['type'], $acceptable)){
		header('Location: inscription.php?message=fileTypeErr&type=danger');
	}
	
	//verifier que le fichier moins de 2Mo, si non : redirection
	$maxSize = 2 * 1024 * 1024; // 2Mo
	if($_FILES['image']['size'] > $maxSize){
		header('Location: inscription.php?message=fileSize&type=danger');
	}

	//créer un dossier dossier "uploads" s'il n'existe pas
	$chemin = 'uploads';
	if(!file_exists($chemin)){
		mkdir($chemin);
	}
	
	$filename = $_FILES['image']['name']; //nom original du fichier, avec son extension
	
	// renommer l'image pour éviter des doublons
	//profil.jpg
	//image.inc.png
	
	$array = explode('.', $filename); // ['image', 'inc', 'png']
	$extension = end($array); // On prend le dernier élément du tableau
	
	// Définition du nouveau de fichier
	$filename = 'image-' . time() . '.' . $extension;
	
	$destination = $chemin . '/' . $filename;
	
	// Enregistrer le fichier dans son emplacement définitif
	move_uploaded_file($_FILES['image']['tmp_name'], $destination);
}


// Requete préparée avec des noms de valeurs
$q = 'INSERT INTO membre (nom_mem, pren_mem, sex_mem, statut, num_tel, email, password, image ) VALUES ( :nom_mem, :pren_mem, :sex_mem, :statut, :num_tel, :email, :password, :image )';
$req = $bdd->prepare($q);
$succes = $req->execute([
	'nom_mem' => $_POST['nom'],
	'pren_mem' => $_POST['prenom'],
	'sex_mem' => $_POST['sexe'],
	'statut' => $_POST['statut'],
	'num_tel' => $_POST['phone'],
	'email' => $_POST['email'],
	'password' => hash('sha512', $_POST['mdp']),
	'image' => isset($filename) ? $filename : '',
]);

if(!$succes){
	// Redirection vers l'inscription avec un message
	header('Location: inscription.php?message=Err&type=danger');
}


// Redirection vers l'accueil avec un message
header('Location: index.php?message=Success&type=success');


