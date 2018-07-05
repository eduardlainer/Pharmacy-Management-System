<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 4/16/2018
 * Time: 9:18 AM
 */
include "../php/connection.php";

$denumire = $pret = $cantitate = $total =  "";


if (empty($_POST["denumire"])) {
    $nameErr = "Este necesar sa introduceti denumirea.";
    echo $nameErr;
} else {
    $denumire = $_POST["denumire"];
    $cantitate = $_POST["cantitate"];
    $pret = $_POST["pret"];
    $total = $cantitate * $pret;


    $sql="INSERT INTO vanzari(Denumire,Cantitate,Pret_bucata,Pret_total) VALUES ('$denumire','$cantitate','$pret','$total')";

    $result= mysqli_query($connection,$sql);
    if (!$result)
        die('Invalid querry:' .mysqli_error($connection));
    else {
        header('Location: ../php/vanzari.php');
    }

}
echo "</br>".$sql;

?>