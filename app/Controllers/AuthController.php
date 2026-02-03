<?php

namespace App\Controllers;

use Core\{Controller, Middleware, Csrf};
use App\Models\User;

class AuthController extends Controller
{
    // GET /login
    public function login()
    {
        Middleware::guest();
        Middleware::ensureSession();
        $this->view('auth/login');
    }

    // POST /login
    public function authenticate()
    {
        Middleware::ensureSession();
        Csrf::verify();
        
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            $_SESSION['error'] = 'Datos incompletos';
            header('Location: /login');
            exit;
        }

        // Usar el método del modelo para autenticar
        $user = User::authenticate($email, $password);

        if (!$user) {
            $_SESSION['error'] = 'Credenciales inválidas';
            header('Location: /login');
            exit;
        }

        // Regenerar ID de sesión por seguridad
        session_regenerate_id(true);
        
        // Usar método del modelo para crear array de sesión
        $_SESSION['user'] = User::toSessionArray($user);
        $_SESSION['toast'] = 'Login exitoso 🎉';
        
        header('Location: /');
        exit;
    }

    // GET /register
    public function register()
    {
        Middleware::guest();
        Middleware::ensureSession();
        $this->view('auth/register');
    }

    // POST /register
    public function store()
    {
        Middleware::ensureSession();
        Csrf::verify();
        
        $name     = $_POST['name'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $_SESSION['error'] = 'Datos incompletos';
            header('Location: /register');
            exit;
        }

        // Usar método del modelo para verificar email
        if (User::emailExists($email)) {
            $_SESSION['error'] = 'El email ya está registrado';
            header('Location: /register');
            exit;
        }

        // Usar método específico del modelo User que hashea la contraseña
        User::createWithHash([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);

        $_SESSION['toast'] = 'Cuenta creada correctamente, ahora inicia sesión 👌';
        header('Location: /login');
        exit;
    }

    public function logout()
    {
        Middleware::auth();
        
        // Destruir completamente la sesión
        $_SESSION = [];
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        
        // Iniciar nueva sesión solo para el mensaje flash
        session_start();
        $_SESSION['toast'] = 'Sesión cerrada correctamente';
        
        header('Location: /');
        exit;
    }
}