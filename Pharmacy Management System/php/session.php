<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/16/2018
 * Time: 4:01 PM
 */
include('connection.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($connection, "select username from users where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['username'];

if (!isset($_SESSION['login_user'])) {
    header("location:index.php");
}

