<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shayarii</title>
</head>
<body>
    <h1> Home</h1>
    <a href="<?php URLROOT?>/post">Home</a>
    <a href="<?php URLROOT?>/post/create">Create a post</a>
    <a href="<?php URLROOT?>/post/myposts">Your Posts</a>
    <a href="<?php URLROOT?>/post/logout">Log out</a>
    <h1>Latest Shayaris</h1>
    <?php
if (!empty($data)) {
    for ($i = 0; $i < sizeof($data); $i++) {
        $title = $data[$i]['title'];
        $body = $data[$i]['body'];
        $email = $data[$i]['email'];
        echo "<div>";
        echo "<h1>$title</h1>";
        echo "<p> $body</p>";
        echo "<p> $email</p>";
        echo "</div>";
    }
} else {
    echo "no data";
}
?>
</body>
</html>