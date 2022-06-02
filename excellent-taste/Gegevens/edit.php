<?php
// customer / edit.php
include_once '../in.db.php';
include_once 'functies.php';

// eerst aanpassen
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // iemand heeft dit gepost!
    // klant toevoegen

    if (isset($_POST['Soort_gerecht']) && isset($_POST['Naam']) && isset($_POST['Categorie_gerecht'])) {
        // alle velden bestaan en zijn ingevuld?
        // check of ze wel waarden hebben:
        $Soort = $_POST['Soort_gerecht'];
        $Naam = $_POST['Naam'];
        $Categorie = $_POST['Categorie_gerecht'];
        $id = $_GET['id'];

        // check of ze leeg zijn:
        if (empty($Soort) OR empty($Naam) OR empty($Categorie)) {
            echo "Alle velden zijn verplicht!<br>";
        } else {
            $update = wijzigGerecht($pdo, $id, $Soort, $Naam, $Categorie);
            //echo $id;
            if (is_numeric($update)) {
                echo "Klant met succes aangepast!<br>";
            } else {
                echo "Daar ging wat fout: " . $update . "<br>";
            }
        }
    }
}

// dan ophalen
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $c = readCustomer($pdo, $id);
        var_dump($c);
}
?>
<!doctype html>
<html>
<head>
    <title>Excellent taste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<form action="edit.php?id=<?= $id?>" method="post">
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