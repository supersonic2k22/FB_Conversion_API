<?php

//Check if isset fbc field (Click ID)
if (isset($_COOKIE['_fbc'])) {
    $fbc = $_COOKIE['_fbc'];
}

//Check if isset fbp field (Browser ID)
if (isset($_COOKIE['_fbp'])) {
    $fbp = $_COOKIE['_fbp'];
}
?>