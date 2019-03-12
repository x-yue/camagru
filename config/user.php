<?php

/*
function exist_user($login)
{
    $path = "private/";
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
    $file = $path.'user.csv';
    if (file_exists($file)) {
        if (($fileContent = file_get_contents($file))) {
            $fileContent = unserialize($fileContent);
            foreach ($fileContent as $key => $value) {
                if ($value['login'] === $login) {
                    return (TRUE);
                }
            }
        }
    }
    return (FALSE);
}*/
?>