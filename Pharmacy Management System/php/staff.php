<?php
include('session.php');
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
            integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
            crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/furnizori.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Angajati</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="../php/dashboard.php"><img src="../images/logo.png" width="55px" height="70" id="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../php/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/sales.php">Clienti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/stock.php">Stoc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/providers.php">Furnizori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/staff.php">Angajati</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <i class="fas fa-users fa-4x mx-auto d-block"></i>
    <div class="row ml-4">
        <?php
        $rezult = "SELECT * FROM users";
        $rezultat = mysqli_query($connection, $rezult);
        if (isset($_GET["del"])) {
            $id = $_GET["del"];
            if ($connection->query("DELETE FROM users WHERE id = $id")) {
                header('Location: ../php/staff.php');
            } else {
                echo "Failed to delete staff member.";
            }
        }
        if ($rezultat->num_rows > 0) {
            while ($row = $rezultat->fetch_assoc()) {
                echo "<div class=\"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-3\">
                            <div class=\"card mt-4\" style=\"width: 18rem;\">
                                <img src=" . $row["image"] . " class=\"card-img-top \" alt=\"Provider image\" height='200px'>
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">" . $row["name"] . "</h5>
                                    <p class=\"card-text\"><span class=\"badge badge-light\">Rol:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span> " . $row["role"] . "</p>
                                    <p class=\"card-text\"><span class=\"badge badge-light\">Telefon:</span> " . $row["telefon"] . "</p>
                                    <p class=\"card-text\"><span class=\"badge badge-light\">Email:&nbsp&nbsp&nbsp&nbsp</span> " . $row["email"] . "</p>
                                    <a  class='btn btn-danger text-center mt-3' style=\"margin-left: 32%\" href='staff.php?del=" . $row["id"] . "'><i class=\"fas fa-trash-alt\"></i> Delete</a>
                                </div>
                            </div>
                        </div>";
            }
        }
        $connection->close();
        ?>
    </div>
</div>

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