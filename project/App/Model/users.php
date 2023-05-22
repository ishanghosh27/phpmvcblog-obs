<?php
namespace App\Model;

use App\Libraries\database;

class users
{
    private $db;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = new database();
    }
    /**
     * register
     * it saves email and password in the database
     * @param  mixed $data
     * @return void
     */
    public function register($data)
    {
        // destructure email and password
        $email = $data["email"];
        $password = $data["password"];
        // create insert query
        $query = "INSERT INTO user (email,password)
        VALUES ('$email', '$password')";
        $result = $this
            ->db
            ->execute($query);
        // returns result
        return $result;
    }
    /**
     * user_exists
     *
     * @param  string  $email
     * @return void
     */
    public function user_exists($email)
    {
        // select query
        $query = "SELECT email from user where email = '$email'";
        //executes query
        $result = $this
            ->db
            ->execute($query);
        if ($result->num_rows) {
            return true;
        }
        return false;
    }
    public function login($data)
    {
        // destructure email and password
        $email = $data["email"];
        $password = $data["password"];
        // select query
        $query = "SELECT `id`,`email` from user where email = '$email' and password = '$password'";
        //executes query
        $result = $this
            ->db
            ->execute($query);
        if ($result->num_rows) {
            return $result->fetch_assoc();
        }
        return false;
    }
}
