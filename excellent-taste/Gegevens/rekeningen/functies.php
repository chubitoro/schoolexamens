<?php
//print de bon uit
function printBon($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT menuitems.Naam,  menuitems.Prijs,SUM( bestellingen.Aantal ) AS aantaltt, SUM( bestellingen.Aantal ) * menuitems.Prijs AS prijstt FROM menuitems INNER JOIN bestellingen ON bestellingen.Menuitem_ID=menuitems.ID GROUP BY menuitems.Naam ");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        return $e;
    }
}

