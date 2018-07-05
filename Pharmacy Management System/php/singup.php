<?php
include('connection.php');
$errors = array();
$succes = false;
// REGISTER USER
if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $rol = mysqli_real_escape_string($connection, $_POST['rol']);


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors,"Username existent!");
        }

        if ($user['email'] === $email) {
            array_push($errors,"Email existent!");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
        $query = "INSERT INTO users (username, password, email, role) 
  			  VALUES('$username', '$password', '$email', '$rol')";
        mysqli_query($connection, $query);
        $succes = true;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/singup.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Pharmacy Management System</title>
</head>
<body>
<div class="baranavigatie">
    <a href="../php/index.php"><img src="../images/logo.png" width="55px" height="70" id="logo"></a>
</div>
<p id="logintext">Pharmacy Management System</p>
<form class="formlogin" method="post" action="singup.php">

    <div class="form-group">
        <input type="username" class="form-control" id="exampleInputUsername"  placeholder="Username" name="username" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
    </div>
    <div class="form-group">
        <input type="username" class="form-control" id="exampleInputEmail1"  placeholder="Email" name="email" required>
    </div>
    <div class="form-group">
        <input type="username" class="form-control" id="exampleInputRole"  placeholder="Farmacist / Asistent"  name="rol" required>
    </div>
    <button type="submit" class="btn btn-primary" name="reg_user">Inregistreaza</button>
    <a href="../php/index.php"><p id="singup">conectare</p></a>
    <?php  if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p class="alert alert-danger text-center"><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    <?php  endif ?>
    <?php if($succes){ ?>
        <div class="alert alert-success text-center">Inregistrare efectuata cu succes!</div>
    <?php } ?>
</form>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>