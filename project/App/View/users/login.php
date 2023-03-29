<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shayarii</title>
    <style>
        <?php require_once(APPROOT . "/View/users/style.css") ?>
    </style>

</head>

<body>


    <form action=" /users/login" method="post">
        <div class="brand-logo"></div>
        <div class="brand-title">Login</div>
        <label for="email">Email</label>
        <input type="email" name="email" id="" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="" required>
        <button type="submit" value="submit">Submit</button>
    </form>
    <a href="<?php URLROOT ?>/users/register">New User?? Then Register</a>
</body>

</html>