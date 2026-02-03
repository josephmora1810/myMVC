<?php

namespace Core;

class Csrf
{
    protected static function ensureSessionStarted()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function token()
    {
        self::ensureSessionStarted();

        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['_csrf'];
    }

    public static function verify()
    {
        self::ensureSessionStarted();

        $token = $_POST['_csrf'] ?? '';

        if (
            empty($_SESSION['_csrf']) ||
            !hash_equals($_SESSION['_csrf'], $token)
        ) {
            http_response_code(419);
            die('CSRF token inválido');
        }

        unset($_SESSION['_csrf']);
    }
}
