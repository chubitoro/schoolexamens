<?php


//pretty print shortcut
function pp($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//get a list of reservations
function reservationList($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM reservation");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}

function createReservation($pdo, $name, $email, $phone)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO reservation (name, email, phone) VALUES (?,?,?)");
        $stmt->execute([$name, $email, $phone]);
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return $e;
    }
}

function deleteReservation($pdo, $id)
{
    try {
        $stmt = $pdo->prepare("DELETE FROM reservation where id = ?");
        $stmt->execute([$id]);
        return $id;
    } catch (PDOException $e) {
        return $e;
    }
}

function readReservation($pdo, $id)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM reservation WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return $e;
    }
}

function editReservation($pdo, $id, $name, $email, $phone)
{
    try {
        $stmt = $pdo->prepare("UPDATE reservation SET name = ?, email = ?, phone = ? WHERE id= ?;");
        $stmt->execute([$name, $email, $phone, $id]);
        return $id;
    } catch (PDOException $e) {
        return $e;
    }
}

