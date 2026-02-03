<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    protected static string $table = 'users';

    public static function authenticate(string $email, string $password)
    {
        $user = static::findByOne('email', $email);
        
        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user->password)) {
            return null;
        }

        return $user;
    }

    public static function createWithHash(array $data)
    {
        // Asegurarse de que la contraseña esté hasheada
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        return parent::create($data);
    }

    public static function findByEmail(string $email)
    {
        return static::findByOne('email', $email);
    }

    public static function emailExists(string $email): bool
    {
        return static::exists('email', $email);
    }

    public static function toSessionArray($user): array
    {
        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
        ];
    }
}