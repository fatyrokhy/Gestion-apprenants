<?php
require_once(PATH ."/app/model/ref.model.php");
global $stat;


$stat = $_GET['statut'] ?? 'Tous';

if (isset($_POST["addRef"])) {
    global $errors;
    $errors=[];
    isEmpty('libelle',$errors);
    isEmpty('capacite',$errors);
    isEmpty('description',$errors);
    estNumeric('capacite',$errors);
    estPositif('capacite',$errors);
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageData = file_get_contents($_FILES['image']['tmp_name']);
} else {
    $imageData = null; // ou gérer une erreur personnalisée
}
    if (empty($errors)) {
    $reference= $ajoutRef($_POST["libelle"],$_POST["capacite"],$imageData,$_POST["description"]);}

    redirection('ref','ref');
}

 $success=null;
if ( isset($_GET['id'])) {
    $id = $_GET['id'];
    $success = $updateStatut($id); // Appel de la fonction du modèle
}



//  Fonction pour récupérer les promos filtrées
$recherche = $_GET['search'] ?? null;
$refs  = fn() => $searchRefs($recherche);  

$listeRef = fn() => renderView(
    'admin',
    'ref',
    [
        'refs' => $refs (),
        'image' => $getImagePromoById,
        'success' => $success
    ],
    'base.layout'
);
