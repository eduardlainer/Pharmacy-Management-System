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
    $sqlcauta = "SELECT * FROM produse WHERE Denumire = '$denumire' ";
} else {
    $sqlcauta = "SELECT * FROM produse";
}
$resultcauta = mysqli_query($db, $sqlcauta);
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

    <link rel="stylesheet" href="../css/stoc.css">

    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <title>Stoc</title>

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
        <i class="fas fa-archive fa-3x mx-auto d-block"></i>
        <form class="form-inline" method="get" action="../php/stoc.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Cauta produs" aria-label="Search"
                   name="cauta">
            <button class="btn btn-outline-success my-2 my-sm-0 asd" type="submit">Cauta</button>

        </form>
        <table class="table">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Denumire</th>
                <th scope="col">Producator</th>
                <th scope="col">Categorie</th>
                <th scope="col">Pret</th>
                <th scope="col">Stoc</th>
                <th scope="col">Data Expirare</th>
                <th scope="col">Actiuni</th>
            </tr>
            <?php
            if(isset($_GET["del"])){
                $id = $_GET["del"];
                if($db->query("DELETE FROM vanzari WHERE id = $id")){
                    header('Location: ../php/stoc.php');
                } else {
                    echo "Failed to delete staff member.";
                }
            }
            if ($resultcauta->num_rows > 0) {
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
                        <td><a  class='btn btn-info' data-toggle=\"modal\" data-target=\"#editareprodusmodal\" href=# data-id='" . $row['ID'] . "'>Editare</a>
                        
                            <a  class='btn btn-danger' href='stoc.php?del=" . $row["ID"] . "'>Delete</a></td>
                    </tr>";
                }

            }
            $db->close();

            ?>
        </table>
        <button type="button" class="btn btn-success mx-auto d-block" data-toggle="modal"
                data-target="#adaugareprodusmodal" id="add">Adaugare
            Produs
        </button>
    </div>
</div>

<!-- modal editare produs -->

<div class="modal fade" id="editareprodusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editare produs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
                <form method="post" action="../php/edit.php">
                    <div class="row introduceredate">
                        <input type="text" name="ID" placeholder="ID" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="denumire" placeholder="Denumire" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="producator" placeholder="Producator" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="categorie" placeholder="Categorie" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="pret" placeholder="Pret" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="stoc" placeholder="Stoc" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="dataexpirare" placeholder="YYYY-MM-DD" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <button type="submit" class="btn btn-success adaugareproduseditare" name="submit"
                                value="Submit">
                            Editare
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal adaugare produs -->

<div class="modal fade" id="adaugareprodusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adaugare produs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../php/stocmodal.php">
                    <div class="row introduceredate">
                        <input type="text" name="denumire" placeholder="Denumire" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="producator" placeholder="Producator" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="categorie" placeholder="Categorie" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="pret" placeholder="Pret" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="stoc" placeholder="Stoc" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="dataexpirare" placeholder="YYYY-MM-DD" class="form-control">
                    </div>
                    <div class="row introduceredate">
                        <button type="submit" class="btn btn-success adaugareprodusadauga" name="submit" value="Submit">
                            Adauga
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

</body>
</html>