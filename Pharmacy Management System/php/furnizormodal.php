<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/18/2018
 * Time: 8:32 PM
 */

include("../php/connection.php");

$furnizor = $informatii = "";

if (empty($_POST["denumirefurnizor"])) {
    $nameErr = "Este necesar sa introduceti denumirea.";
    echo $nameErr;
} else {
    $furnizor = $_POST['denumirefurnizor'];
    $informatii = $_POST['informatii'];
}

$sql="INSERT INTO furnizori(Nume,Despre) VALUES ('$furnizor','$informatii')";

$result= mysqli_query($connection,$sql);
if (!$result)
    die('Invalid querry:' .mysqli_error($connection));
else {
    header('Location: ../php/furnizori.php');
}
echo "</br>".$sql;
