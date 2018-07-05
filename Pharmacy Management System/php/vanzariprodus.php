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
    <link rel="stylesheet" href="../css/vanzariprodus.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Vanzari</title>
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
                <a class="nav-link" href="../php/vanzari.php">Produse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/vanzariprodus.php">Vanzari</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/stoc.php">Stoc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../php/furnizori.php">Furnizori</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <i class="fas fa-chart-line fa-3x mx-auto d-block"></i>
    <div class="row">
        <div class="col-sm-6">
            <div class="carduri">
                <i class="far fa-money-bill-alt fa-4x"></i>
                <?php
                $db = mysqli_connect("127.0.0.1", "root", "", "cursphp");
                $sql = "SELECT SUM(Pret_total) AS pretzi FROM vanzari WHERE DATE(date)=DATE(NOW())";
                $result = $db->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['pretzi'];
                $str = "Astazi: ".$sum." RON";
                echo "<p class=\"textinterior\">$str</p>";
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="carduri">
                <i class="fas fa-dollar-sign fa-4x"></i>
                <?php
                $db = mysqli_connect("127.0.0.1", "root", "", "cursphp");
                $sql = "SELECT SUM(Pret_total) AS suma FROM vanzari";
                $result = $db->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['suma'];
                $str = "Total: ".$sum." RON";
                echo "<p class=\"textinterior\">$str</p>";
                ?>
            </div>
        </div>
    </div>

    <table class="table responsive">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Denumire</th>
            <th scope="col">Cantitate</th>
            <th scope="col">Pret/bucata</th>
            <th scope="col">Pret total</th>
            <th scope="col">Actiuni</th>
        </tr>
        <?php
        include "../php/connection.php";

        $sqlcauta = "SELECT * FROM vanzari";
        $resultcauta = mysqli_query($connection, $sqlcauta);
        if(isset($_GET["del"])){
            $id = $_GET["del"];
            if($db->query("DELETE FROM vanzari WHERE id = $id")){
                header('Location: ../php/vanzariprodus.php');
            } else {
                echo "Failed to delete staff member.";
            }
        }
        if ($resultcauta->num_rows > 0) {
            while ($row = $resultcauta->fetch_assoc()) {
                echo "
                    <tr>
                        <th>" . $row["id"] . "</th>
                        <td>" . $row["Denumire"] . "</td>                    
                        <td>" . $row["Cantitate"] . "</td>
                        <td>" . $row["Pret_bucata"] . "</td>
                        <td>" . $row["Pret_total"] . "</td>
                        <td><a  class='btn btn-danger' href='vanzariprodus.php?del=" . $row["id"] . "'>Delete</a></td>
                        </tr>";
            }

        }
        ?>
    </table>
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
<script>
</script>
</body>
</html>
