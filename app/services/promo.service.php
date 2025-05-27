<?php
require_once(PATH ."/app/model/promotion.model.php");
global $compter,$compterElementSpecifique,$vue,$stat,$ref,$recherche;

$vue = $_GET['vue'] ?? 'grille';


 $ref=select('referentiel');

if (isset($_POST["addPromo"])) {
    $ref_ids = $_POST['check'] ?? [];

     $imageData = file_get_contents($_FILES['image']['tmp_name']);

    $promo_id = $ajoutPromo($_POST["nom"], $_POST["dd"], $_POST["df"],$imageData);

    $ajoutPromoRef($promo_id, $ref_ids);
    redirection('promo','dashboard');
}

 $success=null;
if ( isset($_GET['id'])) {
    $id = $_GET['id'];
    $success = $updateStatut($id); // Appel de la fonction du modèle
}

//  Fonction pour récupérer les promos filtrées
$stat = $_GET['statut'] ?? 'Tous';
$recherche = $_GET['search'] ?? null;
$listPromos = fn() => $searchPromo($recherche,$stat); 

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
        'refs' => $ref,
        'image' => $getImagePromoById,
        'success' => $success

    ],
    'base.layout'
);

