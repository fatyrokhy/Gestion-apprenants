<?php
require_once(PATH ."/app/model/promotion.model.php");
global $compter,$compterElementSpecifique;

 global $vue;
$vue = $_GET['vue'] ?? 'grille';

 global $stat;
$stat = $_GET['statut'] ?? 'Tous';

if (isset($_POST["addPromo"])) {
     $ref_ids = $_POST['check'] ?? [];
$promo_id = fn() => $ajoutPromo($_POST["nom"],$_POST["dd"],$_POST["df"],);
$promoRef = fn() => $ajoutPromoRef($promo_id,$ref_ids);
}

// 2. Fonction pour récupérer les promos filtrées
$listPromos = fn() => $findPromoByStatut($stat);

 global $ref;
 $ref=select('referentiel');

$listePromo = fn() => renderView(
    'admin',
    'liste.promo',
    [
        'apprenant' => $compterElementSpecifique('users', 'role', 'APPRENANT'),
        'promoActif' => $compterElementSpecifique('promotion', 'statut', 'Actif'),
        'ref' => $compter('referentiel'),
        'promo' => $compter('promotion'),
        'liste' => $listPromos(),
        'vue' => $vue,
        'stat' => $stat,
        'refs' => $ref
    ],
    'base.layout'
);


$formPromo = fn() => renderView(
    'admin',
    'liste.promo',
    [
        'ref' => $ref
    ],
    'base.layout'
);