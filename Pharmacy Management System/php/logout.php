<?php
/**
 * Created by PhpStorm.
 * User: Edward
 * Date: 5/16/2018
 * Time: 4:23 PM
 */
session_start();
session_destroy();
header('Location: index.php');
