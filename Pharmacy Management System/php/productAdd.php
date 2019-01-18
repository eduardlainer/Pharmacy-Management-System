<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 4/16/2018
 * Time: 9:18 AM
 */
ob_start();

include('connection.php');

$denumire = $producator = $categorie = $pret = $stoc = $dataexpirare = "";


if (empty($_POST["denumire"])) {
    $nameErr = "Este necesar sa introduceti denumirea.";
    echo $nameErr;
} else {
    $denumire = $_POST["denumire"];
    $producator = $_POST["producator"];
    $categorie = $_POST["categorie"];
    $pret = $_POST["pret"];
    $stoc = $_POST["stoc"];
    $dataexpirare = $_POST["dataexpirare"];

    if (!empty($_FILES['uploaded_file'])) {
        $path = "../images/product-images/";
        $path = $path . basename($_FILES['uploaded_file']['name']);
        move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path);
    }

    $sql = "INSERT INTO produse(Denumire,Producator,Categorie,Pret,Stoc,Data_expirare,Image) VALUES ('$denumire','$producator','$categorie','$pret','$stoc','$dataexpirare','$path')";

    $result = mysqli_query($connection, $sql);
    if (!$result)
        die('Invalid querry:' . mysqli_error($connection));
    else {
        header('Location: ../php/stock.php');
    }
}
echo "</br>" . $sql;

?>