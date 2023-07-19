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
        $infosUser = $userModel->findById($_SESSION['user']['id']);

        $addressModel = new Address($this->getDB());
        $infosUserAddress = $addressModel->findById($_SESSION['user']['address_id']);

        return $this->view('home.profile', compact('infosUser', 'infosUserAddress'));
    }

    public function editProfile()
    {
        // Récupérer les valeurs du formulaire
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $rue = htmlspecialchars($_POST['rue']);
        $zipcode = htmlspecialchars($_POST['zipcode']);
        $city = htmlspecialchars($_POST['city']);
        $country = htmlspecialchars($_POST['country']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $email = htmlspecialchars($_POST['email']);

        // ...

        // Mettre à jour les informations de l'utilisateur
        $user = new User($this->getDB());
        $userId = $_SESSION['user']['id'];
        $userAddressId = $_SESSION['user']['address_id'];


        $addressData = [
            'street' => $rue,
            'zipcode' => $zipcode,
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
            'address_id' => $userAddressId
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
