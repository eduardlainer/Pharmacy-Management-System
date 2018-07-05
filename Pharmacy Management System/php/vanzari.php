<?php
include('session.php');
?>
<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/14/2018
 * Time: 9:05 AM
 */

$db = mysqli_connect("127.0.0.1", "root", "", "cursphp");
$sqlcauta = "";

if (isset($_GET["cauta"]) and $_GET['cauta'] != "") {
    $denumire = $_GET["cauta"];
    $sqlcauta = "SELECT * FROM produse WHERE Denumire = '$denumire'";
} else {
    $sqlcauta = "SELECT * FROM produse";
}

$resultcauta = mysqli_query($db,$sqlcauta);
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
    <link rel="stylesheet" href="../css/vanzari.css">
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
    <div class="table-responsive">
        <i class="fas fa-capsules fa-3x mx-auto d-block"></i>
        <form class="form-inline" method="get" action="../php/vanzari.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Cauta produs" aria-label="Search" name="cauta">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cauta</button>
        </form>
        <table class="table">
            <tr>
                <th scope="col">Nr</th>
                <th scope="col">Denumire</th>
                <th scope="col">Producator</th>
                <th scope="col">Categorie</th>
                <th scope="col">Pret</th>
                <th scope="col">Stoc</th>
                <th scope="col">Data Expirare</th>
                <th scope="col">Actiuni</th>
            </tr>
            <?php
            if (!$resultcauta)
                die('Invalid querry:' .mysqli_error($db));
            else{

                while ($row = $resultcauta->fetch_assoc()) {
                    echo "
                    <tr>
                        <th>" . $row["ID"] . "</th>
                        <td>" . $row["Denumire"] . "</td>
                        <td>" . $row["Producator"] . "</td>
                        <td>" . $row["Categorie"] . "</td>
                        <td>" . $row["Pret"] . "</td>
                        <td>" . $row["Stoc"] . "</td>
                        <td>" . $row["Data_expirare"] . "</td>
                        <td><button type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#vanzareprodus\" >Vinde</button>
                    </tr>";
                }
            }
            ?>
        </table>
    </div>
    <br />
</div>


<!-- modal vanzare produs -->

<div class="modal fade" id="vanzareprodus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vanzare produs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
                <form method="post" action="../php/vanzareprodus.php">
                    <div class="row introduceredate">
                        <input type="text" name="denumire" placeholder="Denumire" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="cantitate" placeholder="Cantitate" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="pret" placeholder="Pret" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <button type="submit" class="btn btn-success adaugareproduseditare" name="submit"
                                value="Submit">
                            Vinde
                        </button>
                    </div>
                </form>
            </div>
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
<script>
</script>
</body>
</html>
