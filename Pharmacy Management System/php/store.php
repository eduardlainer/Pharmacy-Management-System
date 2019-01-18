<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/14/2018
 * Time: 9:05 AM
 */

include('connection.php');

$sqlcauta = "";

if (isset($_GET["cauta"]) and $_GET['cauta'] != "") {
    $denumire = $_GET["cauta"] . "%";
    $sqlcauta = "SELECT * FROM produse WHERE Denumire LIKE '%$denumire%'";
} else {
    $sqlcauta = "SELECT * FROM produse";
}
$resultcauta = mysqli_query($connection, $sqlcauta);
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <title>Pharmacy Shop</title>
</head>
<body>
<div class="baranavigatie">
    <a href="../php/store.php"><img src="../images/logo.png" width="55px" height="70" id="logo"></a>
</div>
<div class="container">
    <ul class="nav mt-3 shadow-sm p-3 mb-5 bg-white rounded">
        <li class="nav-item">
            <a class="nav-link active" href="./store.php"><i class="fas fa-home"></i> ACASA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./cart.php"><i class="fas fa-shopping-cart"></i> COS</a>
        </li>
    </ul>
    <form class="form-inline shadow-sm p-3 mb-4 bg-white rounded" method="get" action="../php/store.php">
        <input class="form-control mr-sm-0" type="search" placeholder="Cauta produs" aria-label="Search"
               name="cauta">
        <button class="btn btn-outline-success my-2 my-sm-0 asd" type="submit">Cauta</button>
        <p id="magazin-cos"><i class="fas fa-shopping-cart"></i> <span id="shop-cart-product-number">0</span> Produse <i
                    class="fas fa-dollar-sign ml-2"></i> <span id="shop-cart-total-sum">0</span> LEI</p>
    </form>

    <h3 id="magazin-produse-title"><i class="fas fa-pills"></i> Produse</h3>

    <div class="magazin-produse">
        <div class="row mx-auto">
            <?php
            if ($resultcauta->num_rows > 0) {
                while ($row = $resultcauta->fetch_assoc()) {
                    $data = $row['Data_expirare'];
                    $data = str_split($data, 10);
                    echo "
                        <div class=\"col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12\">
                            <div class=\"card mt-4\" style=\"width: 18rem;\">
                                <img src=" . $row["Image"] . " class=\"card-img-top\" alt=\"Product image\" height='200px'>
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">" . $row["Denumire"] . "</h5>
                                    <p class=\"card-text\">Pret: <span  class='magazin-produs-pret'>" . $row["Pret"] . "</span> Lei 
                                    <br /> Producator: " . $row["Producator"] . " 
                                    <br /> Categorie: " . $row["Categorie"] . "
                                    <br /> Data expirare: " . $data[0] . "</p>
                                    <a href=\"#\" class=\"btn btn-primary add-cart mx-auto\" data-id=" . $row["ID"] . "
                                    data-name=" . $row["Denumire"] . " data-price=" . $row["Pret"] . ">Adauga in cos</a>
                                </div>
                            </div>
                        </div>
                    ";

                }

            }
            $connection->close();

            ?>
        </div>
    </div>

</div>


<!-- Optional JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../scripts/main.js"></script>
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
