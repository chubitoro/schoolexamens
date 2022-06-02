<?php

function reservatieLijst($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM reserveringen");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}
function maakReservatie($pdo, $Datum, $Tijd, $Tafel,$Klant_ID, $Aantal, $Aantal_k, $Allergieen, $Opmerkingen)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO reserveringen (Datum, Tijd, Tafel, Klant_ID, Aantal, Aantal_k, Allergieen, Opmerkingen ) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$Datum, $Tijd, $Tafel,$Klant_ID, $Aantal, $Aantal_k, $Allergieen, $Opmerkingen]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return $e;
    }
}
function verwijderReservering($pdo, $ID)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM reserveringen where ID = ?");
        $stmt->execute([$ID]);
        return $ID;
    } catch (PDOException $e) {
        return $e;
    }
}