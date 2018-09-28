<?php

$file = '../img/42.png';
if ($file != NULL)
{
    header("Content-Type: image/png");
    readfile($file);
}

?>
