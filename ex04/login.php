<?php

include 'auth.php';
session_start();

if ($_POST)
{
    $login = $_POST[login];
    $pass = $_POST[passwd];

    if (auth($login, $pass) === TRUE)
    {
        $_SESSION["loggued_on_user"] = $login."\n";
        //echo "OK\n";
    ?>
         <iframe name='chat' width='100%' height='550' src='chat.php' style='border:2px solid orange'></iframe>
          <iframe name='speak' width='100%' height='50' src='speak.php' style='border:2px solid black'></iframe>
    <?php
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "ERROR\n";
    }
}
else
{
    $_SESSION["loggued_on_user"] = "";
        echo "Erreur de connexion\n";
}
?>

 