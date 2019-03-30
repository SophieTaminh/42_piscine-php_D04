<?php

function auth($login, $passwd)
{
    if ($login !== "0" && !$login || $passwd !== "0" && !$passwd)
        return FALSE;
    if (file_exists("../private/passwd"))
        {
            $file = file_get_contents("../private/passwd");
            $tab = unserialize($file);
        }
    else
        return FALSE;

    foreach ($tab as $key => $value)
        {
            if ($value[login] === $login && $value[passwd] === hash("whirlpool", $passwd))
                return TRUE;
        }
    return FALSE;
}