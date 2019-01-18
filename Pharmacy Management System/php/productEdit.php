<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/15/2018
 * Time: 9:52 PM
 */

include('connection.php');

$id = $denumire = $producator = $categorie = $pret = $stoc = $dataexpirare = "";


$id = $_POST["ID"];
$denumire = $_POST["denumire"];
$producator = $_POST["producator"];
$categorie = $_POST["categorie"];
$pret = $_POST["pret"];
$stoc = $_POST["stoc"];
$dataexpirare = $_POST["dataexpirare"];


$sql2 = "UPDATE produse SET Denumire = '$denumire', Producator = '$producator', Categorie = '$categorie', Pret = '$pret', Stoc = '$stoc', Data_expirare = '$dataexpirare'  WHERE ID = '$id'";

$result = mysqli_query($connection, $sql2);
if (!$result)
    die('Invalid querry:' . mysqli_error($db));
else {
    header('Location: ../php/stock.php');
}

?>