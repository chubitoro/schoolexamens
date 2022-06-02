<?php
//Build connection made in db.php
include_once '../in.db.php';
//Get functions from functons.php
include_once 'functies.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_POST['name']) or !empty($_POST['email']) or !empty($_POST['phone'])) {
//        alles is ingevuld
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $edit = editCustomer($pdo, $id, $name, $email, $phone);
//        Kijk of de klant is toegevoegd
            if (is_numeric($edit)) {
                echo "Klant met succes aangepast.<br>";
            } else {
                echo "Foute boel bij " . $edit;
            }
        }

    }

    $c = readCustomer($pdo, $id);
//    echo 'Klant is gewijzigd.';


    ?>
    <form method="post" action="edit.php?id=<?= $id ?>">
        Name: <input type="text" name="name" value="<?= $c['name'] ?>"><br>
        Email: <input type="text" name="email" value="<?= $c['email'] ?>"><br>
        Phone: <input type="text" name="phone" value="<?= $c['phone'] ?>"><br>
        <input type="submit" value="Edit">
    </form>
<?php } ?>
