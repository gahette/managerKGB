<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;
use Exception;

class UserController extends Controller
{

    /**
     * @throws Exception
     */
    public function welcome()
    {
        $this->view('layouts.welcome');
    }
    public function login()
    {
        $this->view('auth.login');
    }

    public function loginUsername()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username'=>['required', 'min:3'],
            'password'=>['required']
        ]);

      if ($errors){
          $_SESSION['errors'][] = $errors;
          header('Location: /managerKGB/login');
          exit;
      }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->getPassword())) {

            $_SESSION['auth'] = (int)$user->getAdmin();

            header('Location: /managerKGB/?success=true');
        } else {
            header('Location: /managerKGB/login');
        }
    }

    public function logout()
    {
        session_destroy();

         header('Location: /managerKGB/');
    }
}