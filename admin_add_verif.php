<?php 
      session_start();

      // Si l'email n'est pas vide, enregistrer cet email dans un cookie avec la fonction setcookie()
      if(isset($_POST['email']) && !empty($_POST['email'])){
          setcookie('email', $_POST['email'], time() + 24 * 3600); // Expire dans 24h
      }
      
      // Si email ou password vide > redirection vers le formulaire avec un paramètre get "message" : "Vous devez remplir les 2 champs."
      if(
          !isset($_POST['email'])
          || empty($_POST['email'])
          || !isset($_POST['password'])
          || empty($_POST['password'])
      ){
          header('location: admin_add.php?message=Vous devez remplir tous les champs.&type=danger');
          exit;
      }
      // Si email invalide > redirection vers le formulaire avec un paramètre get "message" : "Email invalide."
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          header('Location: admin_add.php?message=emailErr.&type=danger');
          exit;
      }
      
      // Si le password fait moins de 6 caractères ou plus de 12 > redirection vers le formulaire avec un paramètre get "message" : "Le mot de passe doit comporter entre 6 et 12 caractères."
      
      
      if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 12){
          header('Location: admin_add.php?message=passwordErr.&type=danger');
          exit;
      }
      
      // Connexion à la BDD
      include("includes/db.php");
      
      
      // Vérifier que l'email n'est pas déjà utilisé
      
      // Sélectionner l'id des utilisateurs ayant le même email
      $q = 'SELECT id_admin FROM admin WHERE email = :email';
      $req = $bdd->prepare($q);
      $req->execute(['email' => $_POST['email']]);
      
      // Récupérer tous les résultats
      $results = $req->fetchAll(PDO::FETCH_ASSOC);
      
      
      
      if(!empty($results)){
          // Un ou +s utilisateurs ont l'email envoyé : redirection vers le formulaire
          header('Location: admin_add.php?message=alreadyEmail&type=danger');
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
              header('Location: admin_add.php?message=fileTypeErr&type=danger');
          }
          
          //verifier que le fichier moins de 2Mo, si non : redirection
          $maxSize = 2 * 1024 * 1024; // 2Mo
          if($_FILES['image']['size'] > $maxSize){
              header('Location: admin_add.php?message=fileSize&type=danger');
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
      $q = 'INSERT INTO admin (nom_admin, pren_admin, sex_admin, email, password, image ) VALUES ( :nom_admin, :pren_admin, :sex_admin,:email, :password, :image )';
      $req = $bdd->prepare($q);
      $succes = $req->execute([
          'nom_admin' => $_POST['lastname'],
          'pren_admin' => $_POST['firstname'],
          'sex_admin' => $_POST['sexe'],
          'email' => $_POST['email'],
          'password' => hash('sha512', $_POST['password']),
          'image' => isset($filename) ? $filename : 'pp_neutre.jpg',
      ]);
      
      if(!$succes){
          // Redirection vers l'admin_add avec un message
          header('Location: admin_add.php?message=L\'enregistrement a échoué&type=danger');
      }
      
      
      // Redirection vers l'accueil avec un message
      header('Location: administrators.php?message=Vous avez bien enregistré un administrateur sur Wicookin&type=success');
?>