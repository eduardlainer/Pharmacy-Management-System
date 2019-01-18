<?php
include('connection.php');

$nume = $email = $telefon = $judet = $oras = $adresa = $tipClient = "";

if (empty($_POST["name"])) {
    $nameErr = "Este necesar sa introduceti denumirea.";
    echo $nameErr;
} else {
    $nume = $_POST["name"];
    $telefon = $_POST["phone"];
    $email = $_POST["email"];
    $judet = $_POST["county"];
    $oras = $_POST["city"];
    $adresa = $_POST["address"];
    $tipClient = $_POST["inlineRadioOptions"];

    $sql = "INSERT INTO clienti(nume, email, telefon, judet, oras, adresa, tip_client) VALUES ('$nume','$email','$telefon','$judet', '$oras', '$adresa', '$tipClient')";

    $result = mysqli_query($connection, $sql);
    if (!$result)
        die('Invalid querry:' . mysqli_error($connection));
    else {
        header('Location: ../php/cart.php?order=sent');
    }

}

?>