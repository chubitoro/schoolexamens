<?php
//Build connection made in db.php
include_once '../in.db.php';
//Get functions from functons.php
include_once 'functies.php';

//if ($_SERVER['REQUEST_METHOD'] === "POST") {
//    if (!empty($_POST['Datum']) or !empty($_POST['Tijd']) or !empty($_POST['Tafel']) or !empty($_POST['Klant_ID']) or !empty($_POST['Aantal']) or !empty($_POST['Aantal_k']) or !empty($_POST['Allergieen']) or !empty($_POST['Opmerkingen'])) {
////        alles is ingevuld
//        $Datum = $_POST['Naam'];
//        $email = $_POST['email'];
//        $phone = $_POST['phone'];
//        $id = createCustomer($pdo, $name, $email, $phone);
////        echo $id;
////        Kijk of de klant is toegevoegd
//        if (is_numeric($id)) {
//            echo "Klant met succes toegevoegd.<br>";
//        } else {
//            echo "Foute boel";
//        }
//    }
//
//}
//
//if (!empty($_GET['delete'])) {
//    $id = $_GET['delete'];
//    $del = deleteCustomer($pdo, $id);
//    if (is_numeric($del)) {
//        echo 'Klant is verwijderd.';
//    } else {
//        echo 'Foute boel bij id ' . $id;
//    }
//}
// verwijderen van reservering
if (!empty($_GET['verwijder'])) {
    $ID = $_GET['verwijder'];
    $del = verwijderReservering($pdo, $ID);
    if (is_numeric($del)) {
        echo 'Reservering is succesvol verwijderd.';
    } else {
        echo 'Foute boel bij id ' . $ID;
    }
}

//reserveringen lijst ophalen
$reservaties = reservatieLijst($pdo);
?>
<!doctype html>
<html>
<head>
    <title>Excellent taste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


<br>
<br>

<!--hier maken we een nieuwe reservering-->
<!--<form action="index.php" method="post">-->
<!--    <div class="row mb-3">-->
<!--        <label for="Datum" class="col-sm-2 col-form-label">Datum</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="date" class="form-control" id="Datum">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Tijd" class="col-sm-2 col-form-label">Tijd</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="time" class="form-control" id="Tijd">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Tafel" class="col-sm-2 col-form-label">Tafel</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="text" class="form-control" id="Tafel">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Klant_ID" class="col-sm-2 col-form-label">Naam</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="text" class="form-control" id="Klant_ID">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Aantal" class="col-sm-2 col-form-label">Aantal</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="text" class="form-control" id="Aantal">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="text" class="col-sm-2 col-form-label">Kinderen</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="password" class="form-control" id="Aantal_k">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Allergieen" class="col-sm-2 col-form-label">Allergieen</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="text" class="form-control" id="Allergieen">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row mb-3">-->
<!--        <label for="Opmerkingen" class="col-sm-2 col-form-label">Opmerkingen</label>-->
<!--        <div class="col-sm-10">-->
<!--            <input type="text" class="form-control" id="Opmerkingen">-->
<!--        </div>-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Maak reservatie</button>-->
<!--</form>-->

<!-- hier is het overzicht van reserveringen-->
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Datum</th>
        <th scope="col">Tijd</th>
        <th scope="col">Tafel</th>
        <th scope="col">Klantnaam</th>
        <th scope="col">Aantal</th>
        <th scope="col">verwijderen</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservaties as $rij) { ?>
        <tr>
            <td><?= $rij['ID'] ?></td>
            <td><?= $rij['Datum'] ?></td>
            <td><?= $rij['Tijd'] ?></td>
            <td><?= $rij['Tafel'] ?></td>
            <td><?= $rij['Klant_ID'] ?></td>
            <td><?= $rij['Aantal'] ?></td>
            <td><a href="index.php?verwijder=<?= $rij['ID'] ?>">Verwijderen</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div class="container">
    <div class="row">
        <div class="col">
            Home
        </div>
        <div class="col">
            <a href="../reservering/index.php">Reserveringen</a>
        </div>
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Serveren
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            Gegevens
        </div>
    </div>
</div>

<!--<div class="container">-->
<!--    <p>Welkom bij de reserverings- en bestellingenapplicatie van Restaurant Excellent Taste.-->
<!--        <br>-->
<!--        <br>-->
<!--        Vul eerst een reservering in. Deze kan telefonisch binnenkomen of kan worden ingevoerd als gasten plaatsnemen aan een vrije tafel.-->
<!--        <br>-->
<!--        <br>-->
<!--        Daarna kan een bestelling worden opgenomen.-->
<!--    </p>-->
</div>
</body>
</html>
