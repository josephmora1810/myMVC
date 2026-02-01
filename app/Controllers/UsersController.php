<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id){
            $this->error(404);
        }

        $user = User::findOrFail($id);

        $this->view('users/show',[
            'id' => $id,
            'user' => $user
        ]);
    }
}