<?php
global $refs;
$refs = function () {
$sql="SELECT id, libelle, statut, capacite,image,description
            FROM referentiel 
GROUP BY id
ORDER BY (statut = 'actif') DESC";
return executeSelectAll($sql,[]);
};

global $searchRefs;

$searchRefs = function ($nom) 
{
    $nom = "%$nom%";
    $sql = "SELECT id, libelle, statut, capacite,image,description 
            FROM referentiel 
            WHERE libelle LIKE :nom ";
    
    $param = [':nom' => $nom];

    $sql .= " GROUP BY id, libelle,statut, capacite,image
              ORDER BY (statut = 'Actif') DESC";

    return executeSelectAll($sql, $param);
};

global $getImagePromoById;
$getImagePromoById = function ($id)
{
    try {
        $pdo = connexion(); // ta fonction de connexion existante
        $sql = "SELECT image FROM referentiel WHERE id = :id";
        $param = [];
        $param[':id'] = $id;
        $row = executeSelect($sql, $param);


        if ($row && !empty($row['image'])) {
            $stream = $row['image'];

            // Si c'est un stream, on lit son contenu
            if (is_resource($stream)) {
                return stream_get_contents($stream);
            }

            return $stream; // si ce n'est pas un stream
        }

        return null; // Aucun résultat ou image vide
    } catch (PDOException $e) {
        return null;
    }
};


global $ajoutRef;
$ajoutRef=function ($libelle,$capacite,$image,$description)  {
    $stmt = "INSERT INTO referentiel(libelle, statut, capacite,image,description)
    VALUES (:libelle,:statut,:capacite,:image,:description)";

    $param=[
        ':libelle'=> $libelle,
        ':capacite'=> $capacite,
        ':statut'=> 'Actif',
        ':image'=>$image,
        ':description'=>$description

    ];

    return executInserte($stmt,$param);
};

global $updateStatut;
$updateStatut = function ($id) {

    $stmtSelect = "SELECT statut FROM referentiel WHERE id = :id";
    $paramSelect = [":id" => $id];
    $currentStatus = executeSelect($stmtSelect, $paramSelect); 
    
    
    if (!$currentStatus) {
        //throw new Exception("Promotion introuvable.");
        return;
    }
    $newStatus = ($currentStatus['statut'] == 'Actif') ? 'Inactif' : 'Actif';
    

    $stmtUpdate = "UPDATE referentiel SET statut = :newStatus WHERE id = :id";
    $paramUpdate = [
        ":newStatus" => $newStatus,
        ":id" => $id
    ];

    return executUpdate($stmtUpdate, $paramUpdate);
};



