<?php
session_start();
require_once(PATH ."/app/services/session.service.php");
require_once(PATH ."/app/model/model.php");
require_once(PATH ."/app/controller/controller.php");
define('PAGE','http://faty.niass.ecole221.sn:8005/?');

function run()  {
    $mesControllers=[
        "security" =>PATH ."/app/controller/log.controller.php",
        "promo" =>PATH ."/app/controller/promotion.controller.php",
    ];
    
    $controller=$_REQUEST["controller"]??"security";
        if (array_key_exists($controller,$mesControllers)) {
            if (isConnect() || $controller == "security") {
                require_once $mesControllers[$controller];
            }else {
                redirection("security", "connexion");
            }
        } else {
            echo "Ce controller ".  $controller .  " n'existe pas";
        }
       
    }