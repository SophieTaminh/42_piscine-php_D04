<?php
session_start();
if ($_SESSION !== 0)
    echo $_SESSION["loggued_on_user"];
else
    echo "ERROR\n";