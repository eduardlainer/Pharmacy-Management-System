<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/16/2018
 * Time: 3:45 PM
 */

$connection = mysqli_connect("127.0.0.1", "root", "", "cursphp");
if(!$connection){
    die("Database connection failed!".mysqli_error($connection));
}