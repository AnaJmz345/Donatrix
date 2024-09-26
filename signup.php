<?php
require 'database.php';
$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['type'])) {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users(email, password, type) values('" . $_POST['email'] . "','" . $password . "','" . $_POST['type'] . "')";
    //echo "query to run: " . $sql;
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Registration</title>
    <style type="text/css">
        html, body {
            background-color: #F0F8FF;
            margin: 20px;
        }
        input {
            outline: none;
            padding: 20px;
            display: block;
            width: 300px;
            height: 10px;
            border-radius: 3px;
            border: 1px solid #eee;
            margin: 20px auto;
        }
        button {
            width: 300px;
        }
        .btn {
            background-color: #062A54 !important;
            color: white !important;
        }
    </style>
</head>
<body>

<center>
    <h2>Sign up or</h2>
    <a href="login.php"> Log In</a>
    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="text" name="type" placeholder="Donor or recipient">
        <br>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</center>

</body>
</html>
