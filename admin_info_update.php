<?php 
session_start();
include ('includes/db.php');
$reqModif='UPDATE admin SET nom_admin=:nom_admin, pren_admin=:pren_admin, email=:email WHERE id_admin=:id_admin LIMIT 1';
$modifUser=$bdd->prepare($reqModif);
$update=$modifUser->execute([
                        'nom_admin' => $_POST['lastname'],
                        'pren_admin' => $_POST['firstname'],
						'email' => $_POST['email'],
                        'id_admin' => $_POST['id'],
]);

if(!$update){
	// Redirection vers la liste d'utilisateurs avec un message
	header('location: profile_admin.php.php?message=Erreur lors de l\'enregistrement.&type=danger');
	exit;
}


// Redirection vers la liste d'utilisateurs avec un message
header('location: profile_admin.php?message=L\'utilisateur a été mis à jour!&type=success');
exit;

?>