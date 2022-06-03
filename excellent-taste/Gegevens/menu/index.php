<?php
include_once "functies.php";

include_once "../../in.db.php";
//var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['Soort_gerecht']) or !empty($_POST['Naam']) or !empty($_POST['Categorie_gerecht'])) {
//        alles is ingevuld
        $soort = $_POST['Soort_gerecht'];
        $naam = $_POST['Naam'];
        $categorie = $_POST['Categorie_gerecht'];
        $id = maakGerecht($pdo,$soort, $naam, $categorie);
//        echo $id;
//        Kijk of de klant is toegevoegd
        if (is_numeric($id)) {
            echo "Gerecht met succes toegevoegd.<br>";
        } else {
            echo $id;
        }
    }

}
// verwijderen van reservering
if (!empty($_GET['verwijder'])) {
    $ID = $_GET['verwijder'];
    $del = verwijderGerecht($pdo, $ID);
    if (is_numeric($del)) {
        echo 'Gerecht is succesvol verwijderd.';
    } else {
        echo 'Foute boel bij id ' . $ID;
    }
}

$gerechtCategorie = gerechtenCategorieLijst($pdo);
$gerechtSoort = gerechtenLijst($pdo);
?>
<!doctype html>
<html>
<head>
    <title>Excellent taste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <a class="link-dark" href="index.php">Home</a>
        </div>
        <div class="col">
            <a class="link-dark" href="reservering/index.php">Reserveringen</a>
        </div>
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Gegevens
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="Gegevens/menu/index.php">Menu</a></li>
                    <li><a class="dropdown-item" href="Gegevens/rekeningen/index.php">Rekeningen</a></li>
                </ul>
            </div>
        </div>
        <div class="col">
            <a class="link-dark" href="barman/index.php">Barman Overzicht</a>
        </div>
    </div>
</div>
    <br>
    <br>
    Gerechtsoorten
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Code</th>
            <th scope="col">Naam</th>
            <th scope="col">Gerechtcategorie_ID</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($gerechtSoort as $soort) { ?>
            <tr>
                <td><?= $soort['ID'] ?></td>
                <td><?= $soort['Code'] ?></td>
                <td><?= $soort['Naam'] ?></td>
                <td><?= $soort['Gerechtsoort_ID'] ?></td>
                <td><a href="edit.php?id=<?= $soort['ID'] ?>">edit</a></td>
                <td><a href="index.php?verwijder=<?= $soort['ID'] ?>">Verwijderen</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    hier voegen we een nieuw gerecht toe
    <form action="index.php" method="post">
        <div class="row mb-3">
            <label for="Soort_gerecht" class="col-sm-2 col-form-label">Soort Gerecht</label>
            <select class="form-select" name="Soort_gerecht" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="bik">Bier</option>
                <option value="fik">Frinsdrank</option>
                <option value="koh">Koude hapjes</option>
                <option value="wah">Warme hapjes</option>
                <option value="ijn">IJs</option>
                <option value="kov">Koude Voorgerechten</option>
                <option value="vih">Visgerechten</option>
                <option value="veh">Vegetarische gerechten</option>
                <option value="Sop">Soepen</option>
                <option value="mon">Mousse</option>
            </select>
        </div>
        <div class="row mb-3">
            <label for="Naam" class="col-sm-2 col-form-label">Naam</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Naam">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Categorie_gerecht" class="col-sm-2 col-form-label">Categorie Gerecht</label>
            <select class="form-select" name="Categorie_gerecht" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">Dranken</option>
                <option value="2">Hapjes</option>
                <option value="3">Hoofdgerecht</option>
                <option value="4">Nagerecht</option>
                <option value="5">Voorgerecht</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Voeg gerecht toe</button>
    </form>
</body>
</html>

