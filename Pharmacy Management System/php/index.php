<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/16/2018
 * Time: 3:48 PM
 */

include('connection.php');
session_start();
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($connection, $_POST['username']);
    $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
    $mypassword = md5($mypassword);

    $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['username'] = $myusername;
        $_SESSION['login_user'] = $myusername;

        header("location: dashboard.php");
    } else {
        $error = true;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/indexstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Pharmacy Management System</title>
</head>
<body>
<div class="baranavigatie">
    <a href="../php/dashboard.php"><img src="../images/logo.png" width="55px" height="70" id="logo"></a>
</div>
<p id="logintext">Pharmacy Management System</p>
<form class="formlogin" method="post" action="index.php">

    <div class="form-group">
        <input type="username" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username"
               required>
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
               required>
    </div>
    <button type="submit" class="btn btn-primary">Conectare</button>
    <a href="../php/singup.php"><p id="singup">inregistrare</p></a>
    <?php if ($error) { ?>
        <div class="alert alert-danger text-center">Username sau parola incorecta!</div>
    <?php } ?>
</form>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>