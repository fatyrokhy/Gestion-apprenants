<?php
require_once(PATH . "/app/services/promo.service.php");

if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    // NotReturn();
    switch ($page) {
        case 'dashboard':
            // global $vue;
            $listePromo();
            break;
        case 'formPromo':
            // global $vue;
            $formPromo();
            break;
        default:
            break;
    }
} else {
   $listePromo();
}
