<?php

namespace App\Controllers;

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
                $_SESSION['errors'][] = ['profile_picture' => 'La taille de l\'image ne doit pas dépasser 2 Mo.'];
                return header('Location: /register');
            }

            $fileInfo = pathinfo($_FILES['profile_picture']['name']);
            $fileExtension = strtolower($fileInfo['extension']);

            if (!in_array($fileExtension, $allowedFormats)) {
                $_SESSION['errors'][] = ['profile_picture' => 'Le format de l\'image doit être JPEG, JPG, PNG ou GIF.'];
                return header('Location: /register');
            }

            // Déplace le fichier téléchargé vers le répertoire souhaité
            $uploadDirectory =  'uploads/';
            $uploadedFileName = uniqid() . '.' . $fileExtension;
            $uploadedFilePath = $uploadDirectory . $uploadedFileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadedFilePath)) {
                $_SESSION['errors'][] = ['profile_picture' => 'Erreur lors du téléchargement de l\'image. Veuillez réessayer.'];
                return header('Location: /register');
            }

            // Ajoute le chemin de l'image au tableau des données $_POST
            $_POST['profile_picture'] = $uploadedFileName;
        }
        $user = new User($this->getDB());

        $existingEmail = $user->getUserByEmail($_POST['email']);

        if ($existingEmail) {
            $_SESSION['errors'][] = ['email' => 'Cette adresse e-mail est déjà utilisée.'];
            return header('Location: /register');
        }

        $token = $user->generateToken();

        $_POST['registry_token'] = $token;

        echo $token;

        var_dump($_POST);



        $mailSend = $this->sendRegistryMail($_POST['email'], $_POST['registry_token']);

        if (!$mailSend) {

            $user->register($_POST);
            // Redirection vers l'inscription avec un message
            $_SESSION['errors'][] = ['mail' => 'Le mail n\'a pas été envoyé. Veuillez réessayer.'];
            header('location: /register');

            exit;
        } else {

            // Redirection vers l'accueil avec un message
            $_SESSION['success'][] = ['credentials' => 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.'];
            return header('Location: /login');
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
            $_SESSION['errors'][] = ['credentials' => 'Les informations d\'identification sont incorrectes.'];
            return header('Location: /login');
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
            'addresses_id' => $authenticatedUser->addresses_id

            // ... autres détails de l'utilisateur ...
        ];


        $_SESSION['success'][] = ['credentials' => 'Bienvenue ' . $authenticatedUser->firstname . ' ' . $authenticatedUser->lastname . ' !'];

        // $this->view('home.profile', compact('data'));

        return header('Location: /dashboard');
    }




    public function confirmation()
    {
        $user = new User($this->getDB());
        $email = $_GET['email'];
        $token = $_GET['token'];

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
