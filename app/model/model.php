<?php
function connexion() {
try {
     $pdo = new PDO("'pgsql':host=localhost;dbname=ges_apprenant", "root", "");
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