<?php

namespace App\Models;

use Exception;
use Database\DBConnection;

class User extends Model
{

    protected $table = 'members';

    public function register(array $data): bool
    {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $user = [
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'gender' => isset($data['gender']) ? $data['gender'] : '',
            'type' => $data['type'],
            'phonenumber' => isset($data['phonenumber']) ? $data['phonenumber'] : '',
            'date_of_birth' => isset($data['date_of_birth']) ? date('Y-m-d', strtotime($data['date_of_birth'])) : '',
            'email' => $data['email'],
            'password' => $hashedPassword,
            'profile_picture' => isset($data['profile_picture']) ? $data['profile_picture'] : '',
            'address_id' => isset($data['address_id']) ? $data['address_id'] : '',
            'register_token' => $data['register_token']
        ];

        return $this->create($user);
    }

    public function getuserByEmail(string $email): ?User
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
        return $result ?: null;
    }

    public function getUserById(int $id)
    {
        $result = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id]);
        return $result;
    }

    public function authenticate(string $email, string $password): ?User
    {
        $user = $this->getUserByEmail($email);

        if (!$user) {
            return null;
        }

        $hashedPassword = $user->password;

        if (!password_verify($password, $hashedPassword)) {
            return null;
        }

        return $user;
    }

    public function updatePassword(int $userId, string $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->query("UPDATE {$this->table} SET password = ? WHERE id = ?", [$hashedPassword, $userId]);
    }


    public function confirm($email, $token)
    {
        // Vérifier si l'utilisateur avec l'e-mail et le token donnés existe
        $userQuery = $this->query("SELECT * FROM {$this->table} WHERE email = ? AND register_token = ?", [$email, $token]);
        if ($userQuery) {
            // Si l'utilisateur existe, confirmez l'utilisateur et réinitialisez le token
            $this->query("UPDATE {$this->table} SET confirm = 1, register_token = NULL WHERE email = ? AND register_token = ?", [$email, $token]);
        } else {
            // Si l'utilisateur n'existe pas, renvoyez une erreur
            throw new Exception("Invalid token or email");
        }
    }
}
