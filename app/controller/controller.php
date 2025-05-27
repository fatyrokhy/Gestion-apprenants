<?php
function renderView(string $dossier,string $view,array $datas=[],string $layout="base"):void{
    ob_start();
   extract($datas);
    require_once PATH."/app/views/$dossier/$view.php";
    $contenu=ob_get_clean();
    require_once PATH."/app/views/layout/$layout.php";
}

function redirection(string $controller, string $page){
    header("Location:".PAGE."controller=$controller&page=$page");
    exit();
}

function isPost():bool{
    return $_SERVER["REQUEST_METHOD"] == "POST";
}
function isGet():bool{
    return $_SERVER["REQUEST_METHOD"] == "GET";
}
function isEmpty($name, &$errors, $isCheckbox = false) {
    if ($isCheckbox) {
        if (!isset($_POST[$name])) {
            $errors[$name] = ucfirst($name) . " obligatoire*";
        }
    } 
    else {
        if (!isset($_POST[$name]) || empty(trim($_POST[$name]))) {
            $errors[$name] = ucfirst($name) . " obligatoire*";
        }
    }
}

//Numérique
function estNumeric($name,&$errors) {
    if (!empty(trim($_POST[$name]))) {
        if (!is_numeric($_POST[$name])) {
            $errors[$name]=ucfirst($name)." doit etre numerique";
        }
    }
}
//Positif
function estPositif($name,&$errors){
    if (!empty(trim($_POST[$name])) && is_numeric($_POST[$name])) {
        if ($_POST[$name]<=0) {
        $errors[$name]=ucfirst($name)." doit etre positif";
    }
}
}

//Ne pas retourner a la page de connexion apres connexion
function NotReturnConnexion($controller,$page){
    if (isset($_SESSION["user"]) &&( $controller== "security" || $controller== "" )){
        redirection("promo", $page);
     exit();
    } 
}
//var_dump
function dd($die)  {
    echo "<pre>";
     var_dump($die);
     die();
    echo"</pre>";
 }