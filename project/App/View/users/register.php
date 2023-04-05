<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shayarii</title>
    <link rel="stylesheet" href="/public/user.css">
</head>
<body>
    <form action=" /users/register" method="post" >
    <div class="brand-logo"></div>
        <div class="brand-title">Register</div>
        <label for="email">Email</label>
        <input type="email" name="email" id="" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="" required>
        <button type="submit" value="submit">Submit</button>
    </form>
    <a href="<?php URLROOT?>/users/login">Already an user?? Then Login</a>
</body>
</html>