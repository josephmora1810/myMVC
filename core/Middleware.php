<?php

namespace Core;

class Middleware
{
    public static function ensureSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function auth()
    {
        self::ensureSession(); 
        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public static function guest()
    {
        self::ensureSession();
        if (!empty($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }
}