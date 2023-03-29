<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shayarii</title>
    <style>
        <?php require_once(APPROOT . "/View/post/style.css") ?>
    </style>

</head>

<body>

    <?php
    if (!empty($data)) {
        for ($i = 0; $i < sizeof($data); $i++) {
            $title = $data[$i]['title'];
            $body = $data[$i]['body'];
            $id = $data[$i]['id'];
            $user_id = $data[$i]['user_id'];

            echo "<div>";
            echo "<h1>$title</h1>";
            echo "<p> $body</p>";
            echo "</div>";
            echo " <form action='/post/edit' method='post'>
        <input type='text' name='user_id'  value='$user_id' hidden>
        <input type='text' name='post_id' value = '$id' hidden>
        <button type='submit'>Edit</button>
    </form>";
            echo " <form action='/post/delete' method='post'>
    <input type='text' name='user_id'  value='$user_id' hidden>
    <input type='text' name='post_id' value='$id' hidden>
    <button type='submit'>Delete</button>
</form>";

        }
    } else {
        echo "<h1> No posts</h1>";
    }
    ?>


</body>

</html>