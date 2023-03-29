<?php
namespace App\Controller;

use App\Model\users as user_model;



class users
{
    private $user_model;
    function __construct()
    {
        if (is_logged_in()) {
            header("Location:/" . 'post/home');
            exit();
        }
        $this->user_model = new user_model();

    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['email' => $_POST["email"], 'password' => $_POST["password"]];
            if ($this->user_model->user_exists($data['email'])) {
                // user exist redirect to login page
                header("Location:/" . 'users/login');
                exit();
            } else {
                // if user doesnot exist then register it
                $result = $this->user_model->register($data);
                header("Location:/" . 'users/login');
                exit();
            }
        } else {
            require_once(APPROOT . "/View/users/register.php");
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['email' => $_POST["email"], 'password' => $_POST["password"]];
            if ($this->user_model->user_exists($data['email'])) {
                $result = $this->user_model->login($data);
                if ($result) {
                    set_session($result);
                    header("Location:/" . 'post/home');
                    exit();
                } else {
                    // invalid pass word
                    header("Location:/" . 'users/login');
                    exit();
                }

            } else {
                // invalid email

                header("Location:/" . 'users/login');
                exit();

            }
        } else {
            require_once(APPROOT . "/View/users/login.php");
        }
    }


}


?>