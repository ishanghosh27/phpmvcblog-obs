<?php

namespace App\Controller;

use App\Model\post as post_model;




class post
{
    private $post_model;
    function __construct()
    {
        if (!is_logged_in()) {
            header("Location:/" . 'home');
            exit();
        }
        $this->post_model = new post_model();
        $data = $this->latest();
        require_once(APPROOT . "/View/post/home.php");

    }
    public function home()
    {
        require_once(APPROOT . "/View/post/home.php");
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data["title"] = $_POST['title'];
            $data["shayari"] = $_POST['shayari'];
            $data['user_id'] = $_SESSION['user'];
            $this->post_model->save_post($data);
            header("Location:/" . 'post/home');


        } else {
            // invalid email

            require_once(APPROOT . "/View/post/create.php");

        }
    }
    public function logout()
    {
        log_out();
        header("Location:/" . 'users/login');
        exit();
    }
    public function myposts()
    {
        $id = $_SESSION["user"];
        $result = $this->post_model->get_all_posts($id);
        $i = 0;
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[$i]['title'] = $row['title'];
                $data[$i]['body'] = $row['body'];
                $data[$i]['id'] = $row['id'];
                $data[$i]['user_id'] = $row['user_id'];
                $i++;
            }

        }
        require_once(APPROOT . "/View/post/myposts.php");

    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['post_id'];

            $data = $this->post_model->get_post_by_id($id);

            require_once(APPROOT . "/View/post/edit.php");



        } else {

            header("Location:/" . 'post/home');
            exit();



        }

    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['id'] = $_POST['id'];
            $data['title'] = $_POST['title'];
            $data['shayari'] = $_POST['shayari'];
            $this->post_model->update($data);

            header("Location:/" . 'post/home');
            exit();



        } else {

            header("Location:/" . 'post/home');
            exit();



        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['post_id'];
            $this->post_model->delete($id);

            header("Location:/" . 'post/home');
            exit();



        } else {

            header("Location:/" . 'post/home');
            exit();



        }
    }
    public function latest()
    {
        $result = $this->post_model->latest();
        $i = 0;
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[$i]['email'] = $row['email'];
                $data[$i]['body'] = $row['body'];
                $data[$i]['title'] = $row['title'];

                $i++;
            }

        }
        return $data;

    }

}


?>