<?php
 require_once(PATH."/app/services/log.service.php");
if (isset($_REQUEST["page"])) {
    $page = $_REQUEST["page"];
    // NotReturn();
    switch ($page) {
        case 'connexion':
            login($seConnecter);
            break;
        default:
        break;
    }
} else {
    login($seConnecter);
}

    