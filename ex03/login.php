<?php

include 'auth.php';
session_start();

if ($_GET){
 
    $login = $_GET[login];
    $pass = $_GET[passwd];

    
    if (auth($login, $pass) === TRUE)
    {
        $_SESSION["loggued_on_user"] = $login."\n";
        echo "OK\n";
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "ERROR\n";
    }}
