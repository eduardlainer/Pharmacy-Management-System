<?php
include('session.php');
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
    <link rel="stylesheet" href="../css/dashboardstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Dashboard</title>
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
                <a class="nav-link" href="providers.php">Furnizori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/staff.php">Angajati</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="profil">
        <i class="fas fa-user-md fa-3x mx-auto d-block"></i>
        <?php
        $myusername = $_SESSION['login_user'];
        echo "<p class=\"username\">$myusername</p>";
        $queryrol = "SELECT role FROM users WHERE username = '$myusername'";
        $result = mysqli_query($connection, $queryrol);
        while ($row = $result->fetch_assoc()) {
            echo $row['role'];
        }
        ?>
        <form action="logout.php">
            <button type="submit" class="btn btn-primary logout">Log Out</button>
        </form>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="carduri">
                <i class="far fa-money-bill-alt fa-4x"></i>
                <?php
                $sql = "SELECT SUM(Pret_total) AS pretzi FROM vanzari WHERE DATE(date)=DATE(NOW())";
                $result = $connection->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['pretzi'];
                $str = "Astazi: 150 RON";
                echo "<p class=\"textinterior\">$str</p>";
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="carduri">
                <i class="fas fa-dollar-sign fa-4x"></i>
                <?php
                $sql = "SELECT SUM(Pret_total) AS suma FROM vanzari";
                $result = $connection->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['suma'];
                $str = "Total: 1250 RON";
                echo "<p class=\"textinterior\">$str</p>";
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <a href="../php/sales.php">
                <div class="carduri">
                    <i class="fas fa-list-ol fa-4x"></i>
                    <?php
                    $sql = "SELECT * FROM vanzari";
                    $result = $connection->query($sql);
                    $contor = 0;
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $contor += 1;
                    }

                    echo "<p class=\"textinterior\"> 4  vanzari</p>";
                    ?>
                </div>
            </a>
        </div>

    </div>
    <div class="row">

        <div class="col-sm-4">
            <a href="../php/stock.php">
                <div class="carduri">
                    <i class="fas fa-capsules fa-3x mx-auto d-block"></i>
                    <br/>
                    <?php
                    $sql = "SELECT * FROM produse";
                    $result = $connection->query($sql);
                    $contor = 0;
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $contor += 1;
                    }

                    echo "<p class=\"produsee\">" . $contor . " produse</p>";
                    ?>
                </div>
            </a>
        </div>


        <div class="col-sm-4">
            <a href="providers.php">
                <div class="carduri">
                    <i class="fas fa-truck-moving fa-4x mx-auto d-block"></i>
                    <?php
                    $sql = "SELECT * FROM furnizori";
                    $result = $connection->query($sql);
                    $contor = 0;
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $contor += 1;
                    }

                    echo "<p class=\"totalfurnizori\">" . $contor . " furnizori</p>";
                    $connection->close();
                    ?>
                </div>
            </a>
        </div>


        <div class="col-sm-4">
            <div class="carduri"><a href="../php/staff.php">
                    <i class="fas fa-users fa-4x mx-auto d-block"></i>
                    <?php
                    include("connection.php");
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    $contor = 0;
                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $contor += 1;
                    }
                    if ($contor == 1) {
                        echo "<p class=\"totalfurnizori\">" . $contor . " angajat</p>";
                    } else {
                        echo "<p class=\"totalfurnizori\">" . $contor . " angajati</p>";
                    }
                    $connection->close();
                    ?>
            </div>
            </a>
        </div>

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