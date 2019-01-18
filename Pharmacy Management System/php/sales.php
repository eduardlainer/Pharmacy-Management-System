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
    <i class="fas fa-chart-line fa-3x mx-auto d-block"></i>
    <div class="row">
        <div class="col-sm-6">
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
        <div class="col-sm-6">
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
    </div>

    <table class="table responsive">
        <tr>
            <th scope="col">Nr. Comanda</th>
            <th scope="col">Nume</th>
            <th scope="col">Telefon</th>
            <th scope="col">Judet</th>
            <th scope="col">Oras</th>
            <th scope="col">Adresa</th>
            <th scope="col">Actiune</th>
        </tr>
        <?php
        $sqlcauta = "SELECT * FROM clienti";
        $resultcauta = mysqli_query($connection, $sqlcauta);
        if (isset($_GET["del"])) {
            $id = $_GET["del"];
            if ($connection->query("DELETE FROM clienti WHERE id = $id")) {
                header('Location: ../php/sales.php');
            } else {
                echo "Failed to delete staff member.";
            }
        }
        if ($resultcauta->num_rows > 0) {
            while ($row = $resultcauta->fetch_assoc()) {
                echo "
                    <tr>
                        <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["id"] . "</th>
                        <th>" . $row["nume"] . "</th>
                        <td>" . $row["telefon"] . "</td>
                        <td>" . $row["judet"] . "</td>
                        <td>" . $row["oras"] . "</td>
                        <td>" . $row["adresa"] . "</td>
                        <td><a  class='btn btn-danger' style='margin-left: 10px' href='sales.php?del=" . $row["id"] . "'><i class=\"fas fa-trash-alt\"></i></a></td>
                        </tr>";
            }

        }
        $connection->close();
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
