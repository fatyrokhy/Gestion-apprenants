<?php
require_once(PATH . "/app/services/ref.service.php");

if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    // NotReturn();
    switch ($page) {
        case 'ref':
            $listeRef();
            break;
        default:
            break;
    }
} else {
   $listeRef();
}
