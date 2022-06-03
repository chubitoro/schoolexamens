<?php
    //haal barman data op
function barmanOverzicht($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT reserveringen.Tafel, bestellingen.Aantal, menuitems.Naam FROM bestellingen INNER JOIN reserveringen ON reserveringen.ID=bestellingen.Reservering_ID INNER JOIN menuitems ON Menuitems.ID=bestellingen.Menuitem_ID");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}