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
}

function executUpdate($sql, $params = []) {
    $pdo =connexion();
    $stmt= $pdo->prepare($sql);
    $stmt->execute($params);
     return $stmt;
}

function executSelect($sql, $params = []) {
    $pdo =connexion();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
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
    $pdo=connexion();
    $sql = "SELECT COUNT(*) FROM $table";
    $stmt = $pdo->query($sql);
    return (int) $stmt->fetchColumn();
};
//pour compter la totalite dans une table
$compterElementSpecifique=function ($table,$statut,$stat): int {
    $pdo=connexion();
    $sql = "SELECT COUNT(*) FROM $table WHERE $statut = :valeur";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['valeur' => $stat]);
    return (int) $stmt->fetchColumn();
};
