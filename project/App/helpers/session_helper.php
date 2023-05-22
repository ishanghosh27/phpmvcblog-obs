<?php
session_start();
function set_session($data)
{
    $_SESSION["user"] = $data["id"];
    $_SESSION["email"] = $data["email"];
}
function is_logged_in()
{
    if (isset($_SESSION["user"])) {
        return true;
    }
    return false;
}
function log_out()
{
    session_unset();
    session_destroy();
}
