<?php
namespace App\Model;

use App\Libraries\database;

class post
{
    private $db;
    public function __construct()
    {
        $this->db = new database();
    }
    public function save_post($data)
    {
        $title = $data["title"];
        $user_id = $data["user_id"];
        $shayari = $data["shayari"];
        $query = "INSERT INTO posts (user_id,title,body) VALUES ('$user_id','$title','$shayari')";
        $this->db->execute($query);
    }
    public function update($data)
    {
        $title = $data["title"];
        $shayari = $data["shayari"];

        $id = $data["id"];
        $query = "UPDATE posts SET body = '$shayari' , title = '$title' WHERE id = '$id'";
        $this->db->execute($query);
    }
    public function get_all_posts($id)
    {
        $query = "SELECT * FROM posts WHERE user_id = $id ORDER BY `id` DESC";
        $result = $this->db->execute($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_post_by_id($post_id)
    {
        $query = "SELECT * from posts where id = '$post_id'";
        $result = $this->db->execute($query);
        return $result->fetch_assoc();
    }
    public function delete($id)
    {
        $query = "DELETE FROM posts WHERE id='$id'";
        $this->db->execute($query);
    }
    public function latest()
    {
        $query =
            "select user.email,posts.title,posts.body from user join posts on user.id = posts.user_id";
        $result = $this->db->execute($query);
        return $result;
    }
}
