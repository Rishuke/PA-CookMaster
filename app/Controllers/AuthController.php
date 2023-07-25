<?php

namespace App\Controllers;

use App\Models\Address;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\User;
use App\Validation\Validator;


class AuthController extends Controller
{

    public function register()
    {

        return $this->view('auth.register');
    }

    public function registerPost()
    {
        $validator = new Validator($_POST);
        $validator->validate([
            'lastname' => ['required'],
            'firstname' => ['required'],
            'type' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if ($validator->hasErrors()) {
            $_SESSION['errors'] = $validator->getErrors();
            return header('Location: /register');
        }

        // Vérification de la photo de profil
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
            $allowedFormats = ['jpeg', 'jpg', 'png', 'gif'];
            $maxFileSize = 2 * 1024 * 1024; // 2 Mo

            if ($_FILES['profile_picture']['size'] > $maxFileSize) {
                return header('Location: /register?message=La taille de l\'image ne doit pas dépasser 2 Mo.&type=danger');
            }

            $fileInfo = pathinfo($_FILES['profile_picture']['name']);
            $fileExtension = strtolower($fileInfo['extension']);

            if (!in_array($fileExtension, $allowedFormats)) {
                return header('Location: /register?message=Le format de l\'image n\'est pas autorisé. Seuls les formats jpeg, jpg, png et gif sont autorisés.&type=danger');
            }

            // Déplace le fichier téléchargé vers le répertoire souhaité
            $uploadDirectory =  'uploads/';
            $uploadedFileName = uniqid() . '.' . $fileExtension;
            $uploadedFilePath = $uploadDirectory . $uploadedFileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadedFilePath)) {
                return header('Location: /register?message=Erreur lors du téléchargement de l\'image. Veuillez réessayer.&type=danger');
            }

            // Ajoute le chemin de l'image au tableau des données $_POST
            $_POST['profile_picture'] = $uploadedFileName;
        }
        $user = new User($this->getDB());

        $existingEmail = $user->getUserByEmail($_POST['email']);

        if ($existingEmail) {

            return header('Location: /register?message=Cette adresse e-mail est déjà utilisée.&type=danger');

        }

        $address = new Address($this->getDB());

        $addressData = [
            'street' => isset ($_POST['street'])? htmlspecialchars($_POST['street']) : null,
            'city' => isset ($_POST['city'])? htmlspecialchars($_POST['city']) : null,
            'zipcode' =>  isset ($_POST['zipcode'])? htmlspecialchars($_POST['zipcode']) : null,
            'country' => isset ($_POST['country'])? htmlspecialchars($_POST['country']) : null
        ];

        $address->create($addressData);

        // Génération d'un token aléatoire


        $_POST['register_token'] = $user->generateToken();

        $_POST['address_id'] = $address->getLastInsertId();

        //var_dump($_POST);




        $mailSend = $this->sendRegistryMail($_POST['email'], $_POST['register_token']);

        if (!$mailSend) {

            // Redirection vers l'inscription avec un message
            return header('Location: /register?message=Le mail n\'a pas été envoyé. Veuillez réessayer.&type=danger');


            exit;
        } else {
            $user->register($_POST);
            // Redirection vers l'accueil avec un message
            return header('Location: /register?message=Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter. Un mail d\'activation de votre compte vous a été envoyé.&type=success');

            exit;
        }
    }



    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {



        $validator = new Validator($_POST);
        $validator->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($validator->hasErrors()) {
            $_SESSION['errors'] = $validator->getErrors();
            return header('Location: /login');
        }

        $user = new User($this->getDB());
        $authenticatedUser = $user->authenticate($_POST['email'], $_POST['password']);

        if (!$authenticatedUser) {
            return header('Location: /login?message=Les informations d\'identification sont incorrectes.&type=danger');
        }

        // Authentification réussie, enregistrer les détails de l'utilisateur dans la session
        $_SESSION['user'] = [
            'id' => $authenticatedUser->id,
            'email' => $authenticatedUser->email,
            'firstname' => $authenticatedUser->firstname,
            'lastname' => $authenticatedUser->lastname,
            'type' => $authenticatedUser->type,
            'phonenumber' => $authenticatedUser->phonenumber,
            'date_of_birth' => $authenticatedUser->date_of_birth,
            'gender' => $authenticatedUser->gender,
            'profile_picture' => $authenticatedUser->profile_picture,
            'address_id' => $authenticatedUser->address_id

            // ... autres détails de l'utilisateur ...
        ];

        //return header('Location: /dashboard?message=Bienvenue ' . $authenticatedUser->firstname . ' ' . $authenticatedUser->lastname . ' !&type=success');
        return header('Location: /');
    }




    public function confirmation()
    {
        $user = new User($this->getDB());
        $email = $_GET['email'];
        $token = $_GET['key'];

        $user->confirm($email, $token);

        $_SESSION['success'][] = ['credentials' => 'Votre compte a été confirmé avec succès. Vous pouvez maintenant vous connecter.'];

        return header('Location: /login');
    }





    public function logout()
    {
        session_destroy();

        return header('Location: /');
    }
}
