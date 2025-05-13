<?php
$seConnecter=function ($mail,$pass)  {
    $user = "SELECT * FROM users u 
    WHERE u.email =:mail AND u.mot_de_passe=:pass";
    $param=[':mail'=>$mail,
    ':pass'=>$pass]; 
    return executeSelect($user,$param) ;
};