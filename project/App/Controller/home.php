<?php

namespace App\Controller;






class home
{
    function __construct()
    {
        if (is_logged_in()) {
            header("Location:/" . 'post/home');
            exit();
        }
        require_once(APPROOT . "/View/users/register.php");


    }
}


?>