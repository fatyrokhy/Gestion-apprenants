<?php
require_once(PATH ."/app/model/promotion.model.php");
global $compter,$compterElementSpecifique,$vue,$stat,$re;

$vue = $_GET['vue'] ?? 'grille';

$stat = $_GET['statut'] ?? 'Tous';

 $ref=select('referentiel');

if (isset($_POST["addPromo"])) {
    $ref_ids = $_POST['check'] ?? [];

     $imageData = file_get_contents($_FILES['image']['tmp_name']);

    $promo_id = $ajoutPromo($_POST["nom"], $_POST["dd"], $_POST["df"],$imageData);

    $ajoutPromoRef($promo_id, $ref_ids);
    redirection('promo','dashboard');
}


$image = fn($id) =>$getImagePromoById($id);

// 2. Fonction pour récupérer les promos filtrées
$listPromos = fn() => $findPromoByStatut($stat); 

$listeRef = fn() => renderView(
    'admin',
    'ref',
    [
        'refs' => $ref,
    ],
    'base.layout'
);
