<?php

function maakGerecht($pdo, $Code, $Naam, $Gerechtcategorie_ID) {
    try {
        $stmt = $pdo->prepare("INSERT INTO menuitems (Code, Naam, Gerechtsoort_ID) VALUES (?, ?, ?)");
        $stmt->execute([$Code, $Naam, $Gerechtcategorie_ID]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return $e;
    }
}

function gerechtenCategorieLijst($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM gerechtcategorien");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}
function gerechtenLijst($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM menuitems");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}

function wijzigGerecht($pdo, $ID, $Code, $Naam, $Gerechtsoort_ID) {
    try {
        $stmt = $pdo->prepare("UPDATE menuitems SET Code = ?, Naam = ?, Gerechtsoort_ID = ? WHERE ID = ?");
        $stmt->execute([$Code, $Naam, $Gerechtsoort_ID, $ID]);
        return $ID;
    } catch (PDOException $e) {
        return $e;
    }
}
function readCustomer($pdo, $id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM menuitems WHERE ID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}
function verwijderGerecht($pdo, $ID)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM menuitems where ID = ?");
        $stmt->execute([$ID]);
        return $ID;
    } catch (PDOException $e) {
        return $e;
    }
}
?>

