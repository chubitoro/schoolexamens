<?php
include_once "../../in.db.php";
include_once "functies.php";


$printBon = printBon($pdo);

$totaalPrijs = 0;

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
<!--maak hier een onclick pop up van-->
<!--<button onclick="--><?//=printBon($pdo)?><!--" name="bon">PRINT BON</button>-->

<br>Dit is de bon:
<table border="1" id="element-to-print">
    <thead>
    <tr>
        <th>Product naam</th>
        <th>Aantal</th>
        <th>Prijs</th>
        <th>Totaal</th>

    </tr>
    </thead>
    <tbody>


    <?php
    foreach ($printBon as $r) {
        ?>
        <tr>
            <td><?= $r['Naam'] ?></td>
            <td><?= $r['aantaltt'] ?></td>
            <td><?= $r['Prijs'] ?></td>
            <td><?= $r['prijstt'] ?></td>
        </tr>
        <?php
        $totaalPrijs += $r['prijstt'];
    }
    ?>

    </tbody>
</table>
<script>
    var element = document.getElementById('element-to-print');
    html2pdf(element);
</script>

<a>Het totaal bedrag is: €<?= $totaalPrijs ?></a>
</body>
</html>