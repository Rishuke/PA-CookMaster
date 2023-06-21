<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;


class UserController extends Controller {

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
            'gender' => ['required'],
            'status' => ['required'],
            'phonenumber' => ['required'],
            'birth_date' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);
    
        if ($validator->hasErrors()) {
            $_SESSION['errors'] = $validator->getErrors();
            return header('Location: /register');
        }
    
        // Vérification de la photo de profil
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $allowedFormats = ['jpeg', 'jpg', 'png', 'gif'];
            $maxFileSize = 2 * 1024 * 1024; // 2 Mo
    
            if ($_FILES['profile_image']['size'] > $maxFileSize) {
                $_SESSION['errors'][] = ['profile_image' => 'La taille de l\'image ne doit pas dépasser 2 Mo.'];
                return header('Location: /register');
            }
    
            $fileInfo = pathinfo($_FILES['profile_image']['name']);
            $fileExtension = strtolower($fileInfo['extension']);
    
            if (!in_array($fileExtension, $allowedFormats)) {
                $_SESSION['errors'][] = ['profile_image' => 'Le format de l\'image doit être JPEG, JPG, PNG ou GIF.'];
                return header('Location: /register');
            }
    
                // Déplace le fichier téléchargé vers le répertoire souhaité
            $uploadDirectory = ACCESS . 'uploads/';
            $uploadedFileName = uniqid() . '.' . $fileExtension;
            $uploadedFilePath = $uploadDirectory . $uploadedFileName;

            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }

            if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadedFilePath)) {
                $_SESSION['errors'][] = ['profile_image' => 'Erreur lors du téléchargement de l\'image. Veuillez réessayer.'];
                return header('Location: /register');
            }

            // Ajoute le chemin de l'image au tableau des données $_POST
            $_POST['profile_image'] = $uploadedFileName;
        }
        $user = new User($this->getDB());
    
        $existingEmail = $user->getByEmail($_POST['email']);
    
        if ($existingEmail) {
            $_SESSION['errors'][] = ['email' => 'Cette adresse e-mail est déjà utilisée.'];
            return header('Location: /register');
        }
    
        $user->register($_POST);
    
        return header('Location: /login');
    }
    

    
    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        // Logique de connexion de l'utilisateur
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /');
    }
    
    
    
}
