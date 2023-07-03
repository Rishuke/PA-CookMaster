<?php

namespace App\Models;

use Database\DBConnection;

class User extends Model {

    protected $table = 'members';

    public function register(array $data): bool
    {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $user = [
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'gender' => $data['gender'],
            'status' => $data['status'],
            'phonenumber' => $data['phonenumber'],
            'birth_date' => $data['birth_date'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'profile_image' => isset($data['profile_image']) ? $data['profile_image'] : 'pp_neutre.jpg'
        ];

        return $this->create($user);
    }

    public function getByEmail(string $email): ?User
{
    $result = $this->query("SELECT * FROM {$this->table} WHERE email = ?", [$email], true);
    return $result ?: null;
}

public function authenticate(string $email, string $password): ?User
    {
        $user = $this->getByEmail($email);

        if (!$user) {
            return null;
        }

        $hashedPassword = $user->password;

        if (!password_verify($password, $hashedPassword)) {
            return null;
        }

        return $user;
    }

    
}
