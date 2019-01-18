<?php
include('session.php');
?>
<?php
ob_start();

$sqlcauta = "";

if (isset($_GET["cauta"]) and $_GET['cauta'] != "") {
    $denumire = $_GET["cauta"];
    $sqlcauta = "SELECT * FROM produse WHERE Denumire LIKE '%$denumire%' ";
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
    <div class="table-responsive">
        <i class="fas fa-archive fa-3x mx-auto d-block"></i>
        <form class="form-inline" method="get" action="../php/stock.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Cauta produs" aria-label="Search"
                   name="cauta">
            <button class="btn btn-outline-success my-2 my-sm-0 asd" type="submit">Cauta <i class="fas fa-search"></i>
            </button>

        </form>
        <table class="table">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produs</th>
                <th scope="col">Producator</th>
                <th scope="col">Categorie</th>
                <th scope="col">Pret</th>
                <th scope="col">Stoc</th>
                <th scope="col">Data Expirare</th>
                <th scope="col">Actiuni</th>
            </tr>
            <?php
            if (isset($_GET["del"])) {
                $id = $_GET["del"];
                if ($connection->query("DELETE FROM produse WHERE id = $id")) {
                    header('Location: ../php/stock.php');
                } else {
                    echo "Failed to delete staff member.";
                }
            }
            if ($resultcauta->num_rows > 0) {
                while ($row = $resultcauta->fetch_assoc()) {
                    $data = $row['Data_expirare'];
                    $data = str_split($data, 10);
                    echo "
                    <tr>
                        <th>" . $row["ID"] . "</th>
                        <td>" . $row["Denumire"] . "</td>
                        <td>" . $row["Producator"] . "</td>
                        <td>" . $row["Categorie"] . "</td>
                        <td>" . $row["Pret"] . "</td>
                        <td>" . $row["Stoc"] . "</td>
                        <td>" . $data[0] . "</td>
                        <td><a  class='btn btn-info buton-editare' data-toggle=\"modal\" data-target=\"#editareprodusmodal\" href=# data-id='" . $row['ID'] . "' 
                        data-produs='" . $row['Denumire'] . "' data-producator='" . $row['Producator'] . "' data-categorie='" . $row['Categorie'] . "'
                        data-pret='" . $row['Pret'] . "' data-stoc='" . $row['Stoc'] . "' data-dataexpirare='" . $data[0] . "'><i class=\"fas fa-edit fa-1x\"></i></a>
                        
                            <a  class='btn btn-danger' href='stock.php?del=" . $row["ID"] . "'><i class=\"fas fa-trash-alt\"></i></a></td>
                    </tr>";
                }
            }
            $connection->close();
            ?>
        </table>
        <button type="button" class="btn btn-success mx-auto d-block" data-toggle="modal"
                data-target="#adaugareprodusmodal" id="add"><i class="fas fa-plus-square"></i> Adaugare
            produs
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
                <form method="post" action="productEdit.php" id="editform">
                    <div class="row introduceredate">
                        <input type="text" name="ID" placeholder="ID" class="form-control" id="idedit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="denumire" placeholder="Denumire" class="form-control"
                               id="denumireedit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="producator" placeholder="Producator" class="form-control"
                               id="producatoredit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="categorie" placeholder="Categorie" class="form-control"
                               id="categoriedit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="pret" placeholder="Pret" class="form-control" id="pretedit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="stoc" placeholder="Stoc" class="form-control" id="stocedit">
                    </div>
                    <div class="row introduceredate">
                        <input type="text" name="dataexpirare" placeholder="YYYY-MM-DD" class="form-control"
                               id="dataedit">
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
                <form method="post" action="productAdd.php" enctype="multipart/form-data">
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
                        <input type="file" name="uploaded_file">
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