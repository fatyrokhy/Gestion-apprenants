<?php
 require_once(PATH."/app/services/promo.service.php");
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    // NotReturn();
    switch ($page) {
        case 'dashboard':
            listePromo($compter,$compterElementSpecifique) ;
            break;
        default:
        break;
    }
} else {
    listePromo($compter,$compterElementSpecifique);
}

    