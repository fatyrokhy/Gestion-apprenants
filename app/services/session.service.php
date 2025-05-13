<?php
function isConnect():bool {
    return isset($_SESSION["user"]);
}

function addToSession(string $key, $value){
    $_SESSION[$key]=$value;
}

function getUser(){
    return $_SESSION["user"]??[];
}
