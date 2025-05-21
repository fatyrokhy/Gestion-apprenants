<?php
global $listePromos;
$listPromos = function () {
$sql="SELECT p.*,string_agg(r.libelle, ', ') AS libelle FROM promotion p
JOIN referentiel_promotion rp ON rp.id_promotion=p.id
JOIN referentiel r ON r.id=rp.id_referentiel
GROUP BY p.id
ORDER BY (p.statut = 'actif') DESC
";
return executSelect($sql,[]);
};

global $findPromoByStatut;
$findPromoByStatut = function ($statut) {
    $sql = "SELECT p.*, string_agg(r.libelle, ', ') AS libelle 
            FROM promotion p
            JOIN referentiel_promotion rp ON rp.id_promotion = p.id
            JOIN referentiel r ON r.id = rp.id_referentiel ";

    $param = [];

    if ($statut !== 'Tous') {
        $sql .= "WHERE p.statut = :statut ";
        $param[':statut'] = $statut;
    }

    $sql .= "GROUP BY p.id
             ORDER BY (p.statut = 'Actif') DESC";

    return executSelect($sql, $param);
};
global $ajoutPromo;
//ajouter dans professeur
$ajoutPromo=function ($nom,$date_debut,$date_fin)  {
    $stmt = "INSERT INTO promotion(nom, date_debut, date_fin,statut)
    VALUES (:nom,:date_debut,:date_fin,:statut)";

    $param=[
        ':nom'=> $nom,
        ':date_debut'=> $date_debut,
        ':date_fin'=> $date_fin,
        ':statut'=> 'Actif'
    ];
    return executInsert($stmt,$param);
};

//ajout dans referenteiel_prommotion
global $ajoutPromoRef;  

$ajoutPromoRef= function ($promo_id, $ref_ids)
{
    $sql = "INSERT INTO referentiel_promotion (id_promotion, id_referentiel) VALUES (:promo, :ref)";

    foreach ($ref_ids as $ref) {
        $param=[
            ':promo' => $promo_id,
            ':ref' => $ref
        ];
    }
    return executInsert($sql,$param);
};

//values des champs modif
function valueChampsProf($id)  {
    $pdo=connexion();
    $select =$pdo->prepare("SELECT p.*,u.id AS id_user,u.nom,u.prenom,u.email,u.sexe,u.mot_de_passe,
    s.id AS id_special ,s.libelle AS specialite ,cl.libelle AS libelle ,cl.id AS id_classe
    FROM professeurs p
    JOIN utilisateurs u ON u.id=p.utilisateur_id
    JOIN specialites s ON s.id=p.specialite_id
    JOIN classes_professeurs cp ON cp.professeur_id=p.id
    JOIN classes cl ON cp.classe_id=cl.id
    WHERE p.id=:id ");
    $select->execute([':id'=>$id]); 
    $result =  $select->fetchAll(PDO::FETCH_ASSOC); 
    if (!$result) return [];

    // On prend les infos du prof dans la première ligne
    $prof = $result[0];
    // On extrait toutes les classes associées
    $prof['classes'] = array_column($result, 'id_classe');
    return $prof; 
}

 //Modification Utilisateur
 function modifierUser($id,$nom,$prenom,$sexe)
 {
    $pdo=connexion();
    $select =$pdo->prepare("UPDATE utilisateurs u SET nom=:nom,prenom=:prenom,
    sexe=:sexe
    WHERE u.id=:id");
    $select->execute([
        ':id'=>$id,
        ':nom'=>$nom,
        ':prenom'=> $prenom,
        ':sexe'=> $sexe,
         ]);
    return $select;
}
//Modification Professeur
function modifierProf($id,$grade,$spec)
{
   $pdo=connexion();
   $select =$pdo->prepare("UPDATE professeurs p SET grade=:grade,etat=:etat,specialite_id=:spec
   WHERE p.id=:id");
   $select->execute([
       ':id'=>$id,
       ':grade'=>$grade,
       ':etat'=> 'actif',
       ':spec'=> $spec
        ]);
   return $select;
}

// Modification classes_professeurs
function misAJourProfClasses($prof_id, $nouvelles_classes_ids) {
    $pdo = connexion();

    $stmt = $pdo->prepare("DELETE FROM classes_professeurs WHERE professeur_id = :prof_id");
    $stmt->execute([':prof_id' => $prof_id]);

    // $ajoutPromoRef($prof_id, $nouvelles_classes_ids);
}



