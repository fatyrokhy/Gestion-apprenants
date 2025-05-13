<?php
 require_once(PATH."/app/services/promo.service.php");
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    // NotReturn();
    switch ($page) {
        case 'connexion':
            listePromo();
            break;
        
        default:
        break;
    }
} else {
    listePromo();
}

    