<?php
namespace App\Controller;

/**
 * home
 */
class home
{
    public function __construct()
    {
        if (is_logged_in()) {
            header("Location:/" . 'post/home');
            exit();
        }
        require_once APPROOT . "/View/users/register.php";
    }
}
