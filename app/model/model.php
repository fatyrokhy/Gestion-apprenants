<?php
function connexion() {
try {
     $pdo = new PDO("pgsql:host=localhost;dbname=ges_apprenant", "postgres", "tresor112");
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       return $pdo;
    } catch (PDOException $e) {
        echo "Connection échouée: " . $e->getMessage();
} 
}

function executInsert($sql, $params) {
    $pdo =connexion();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $pdo->lastInsertId();
};

function executUpdate($sql, $params = []) {
    $pdo =connexion();
    $stmt= $pdo->prepare($sql);
    $stmt->execute($params);
     return $stmt;
};

function executSelect($sql, $params = []) {
    $pdo =connexion();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// temporaire
// function executSelect($sql, $params = []) {
//     $pdo = connexion();
//     echo "<!-- Requête SQL : $sql -->"; // Debug visible en HTML
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute($params);
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     if (empty($results)) {
//         echo "<!-- Aucun résultat pour la requête -->";
//     }
//     return $results;
// }
function executeSelect($sql, $params = []) {
    $pdo =connexion();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//pour récupérer l'id
function getId($sql, $params = []) {
    $pdo =connexion();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $row = $stmt->fetch(); 
    return $row ? $row['id'] : null;
}
//pour compter la totalite dans une table
$compter=function ($table): int {
    $sql = "SELECT COUNT(*) as count FROM $table";
    $result = executSelect($sql);
    return $result[0]['count'] ?? 0;
};
//pour compter la totalite dans une table
$compterElementSpecifique=function ($table,$colonne,$value): int {
    $sql = "SELECT COUNT(*) as count FROM $table WHERE $colonne = :valeur";
    $param=['valeur' => $value];
    $result = executSelect($sql,$param);
    return $result[0]['count'] ?? 0;
};


//POUR Selectionner tableau
function select($elements) {
    $pdo=connexion();
    $select =$pdo->prepare("SELECT *  FROM $elements");
    $select->execute(); 
    $result = $select->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
}