<?php
global $seConnecter;
$seConnecter=function ($mail,$pass)  {
    $user = "SELECT * FROM users  
    WHERE email =:mail AND pass=:pass";
    $param=[':mail'=>$mail,
    ':pass'=>$pass]; 
    return executeSelect($user,$param) ;
};