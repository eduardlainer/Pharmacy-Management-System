<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 4/16/2018
 * Time: 9:18 AM
 */

$db=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($db,"cursphp");


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





    $sql="INSERT INTO produse(Denumire,Producator,Categorie,Pret,Stoc,Data_expirare) VALUES ('$denumire','$producator','$categorie','$pret','$stoc','$dataexpirare')";

    $result= mysqli_query($db,$sql);
    if (!$result)
        die('Invalid querry:' .mysqli_error($db));
    else {
        header('Location: ../php/stoc.php');
    }

}
echo "</br>".$sql;

?>