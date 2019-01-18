<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/18/2018
 * Time: 8:32 PM
 */

include("connection.php");

ob_start();

$furnizor = $informatii = "";

if (empty($_POST["denumirefurnizor"])) {
    $nameErr = "Este necesar sa introduceti denumirea.";
    echo $nameErr;
} else {
    $furnizor = $_POST['denumirefurnizor'];
    $informatii = $_POST['informatii'];
}

if (!empty($_FILES['uploaded_file'])) {
    $path = "../images/providers/";
    $path = $path . basename($_FILES['uploaded_file']['name']);
    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path);
}

$sql = "INSERT INTO furnizori(Nume,Despre,Image) VALUES ('$furnizor','$informatii','$path')";

$result = mysqli_query($connection, $sql);
if (!$result)
    die('Invalid querry:' . mysqli_error($connection));
else {
    header('Location: ../php/providers.php');
}
echo "</br>" . $sql;
