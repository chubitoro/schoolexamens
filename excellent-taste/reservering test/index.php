<?php
//Build connection made in db.php
include_once '../in.db.php';
//Get functions from functons.php
include_once 'functies.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['name']) or !empty($_POST['email']) or !empty($_POST['phone'])) {
//        alles is ingevuld
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = createCustomer($pdo, $name, $email, $phone);
//        echo $id;
//        Kijk of de klant is toegevoegd
        if (is_numeric($id)) {
            echo "Klant met succes toegevoegd.<br>";
        } else {
            echo "Foute boel";
        }
    }

}

if (!empty($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = deleteCustomer($pdo, $id);
    if (is_numeric($del)) {
        echo 'Klant is verwijderd.';
    } else {
        echo 'Foute boel bij id ' . $id;
    }
}


$customers = customerList($pdo);

////pretty print list of customer
//pp(customerList($customers));

//Create a table with customers from the database
?>
<form method="post" action="index.php">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" value="Create">
</form>
<hr>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($customers as $row) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><a href="index.php?delete=<?= $row['id'] ?>">delete</a> | <a href="edit.php?id=<?= $row['id'] ?>">edit</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>