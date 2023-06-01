<?php 
session_start();
include ('includes/db.php');
$reqModif='UPDATE membres SET nom_mem=:nom_mem, pren_mem=:pren_mem, email=:email, num_tel=:num_tel, statut=:statut WHERE num_mem=:num_mem LIMIT 1';
$modifUser=$bdd->prepare($reqModif);
$update=$modifUser->execute([
                        'nom_mem' => $_POST['lastname'],
                        'pren_mem' => $_POST['firstname'],
						'email' => $_POST['email'],
						'num_tel' => $_POST['phonenumber'],
						'statut' => $_POST['statut'],
                        'num_mem' => $_POST['id'],
]);

if(!$update){
	// Redirection vers la liste d'utilisateurs avec un message
	header('location: profile.php.php?message=Erreur lors de l\'enregistrement.&type=danger');
	exit;
}


// Redirection vers la liste d'utilisateurs avec un message
header('location: profile.php?message=L\'utilisateur a été mis à jour!&type=success');
exit;

?>