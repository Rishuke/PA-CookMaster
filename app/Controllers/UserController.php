<?php

namespace App\Controllers;

use Exception;
use App\Models\User;
use App\Models\Address;



class UserController extends Controller
{

    public function profile()
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            return header('Location: /login');
        }

        $userModel = new User($this->getDB());
        $users = $userModel->getUserById($_SESSION['user']['id']);

        // $addresses = null; // Initialiser $addresses à null
        if ($_SESSION['user']['addresses_id']) {

            $addressModel = new Address($this->getDB());
            $addresses = $addressModel->getAddressById($_SESSION['user']['addresses_id']);
        }

        return $this->view('home.profile', compact('users', 'addresses'));
    }

    public function editProfile()
    {
        // Récupérer les valeurs du formulaire
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $rue = $_POST['rue'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];

        // ...

        // Mettre à jour les informations de l'utilisateur
        $user = new User($this->getDB());
        $userId = $_SESSION['user']['id'];
        $userAddressId = $_SESSION['user']['addresses_id'];


        $addressData = [
            'street' => $rue,
            'postal_code' => $postal_code,
            'city' => $city,
            'country' => $country,
        ];

        if (is_null($userAddressId)) {

            $addressModel = new Address($this->getDB());
            $addressModel->create($addressData);
            $userAddressId = $addressModel->getLastId();

            var_dump($userAddressId);
        }

        // Mettre à jour les informations de l'utilisateur
        $userData = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'phonenumber' => $phonenumber,
            'email' => $email,
            'addresses_id' => $userAddressId
        ];

        // Mettre à jour l'adresse de l'utilisateur
        $addressModel = new Address($this->getDB());


        $addressModel->update($userAddressId, $addressData);
        $user->update($userId, $userData);

        // $_SESSION['user'] = [

        //     'email' => $email,
        //     'firstname' => $firstname,
        //     'lastname' => $lastname,
        //     'phonenumber' => $phonenumber,
        //     'addresses_id' => $userAddressId

        //     // ... autres détails de l'utilisateur ...
        // ];


        // Rediriger vers la page de profil ou afficher un message de succès
        header('Location: /profile');
        exit();
    }




    public function changePassword()
    {
        // Récupérer les valeurs du formulaire
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];


        // Vérifier la correspondance du mot de passe actuel
        $user = new User($this->getDB());
        $authenticatedUser = $user->authenticate($_SESSION['user']['email'], $currentPassword);

        if (!$authenticatedUser) {
            // Mot de passe actuel incorrect, afficher un message d'erreur
            $_SESSION['errors'][] = ['currentPassword' => 'Le mot de passe actuel est incorrect.'];
            header('Location: /profile');
            exit();
        }


        if ($newPassword !== $confirmPassword) {
            $_SESSION['errors'][] = ['confirmPassword' => 'Les mots de passe ne correspondent pas.'];
            header('Location: /profile');
            exit();
        }


        // Mettre à jour le mot de passe
        $userId = $_SESSION['user']['id'];
        $user->updatePassword($userId, $newPassword);

        $_SESSION['success'][] = ['password' => 'Votre mot de passe a été changé avec succès.'];

        // Rediriger vers la page de profil ou afficher un message de succès
        header('Location: /profile');
        exit();
    }
}
