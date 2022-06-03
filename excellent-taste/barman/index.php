<?php

include_once '../in.db.php';
include_once 'functies.php';

$barman = barmanOverzicht($pdo);

?>
<html>
<table border="1">
    <thead>
    <tr>
        <th>Tafel</th>
        <th>Aantal</th>
        <th>Naam</th>


    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($barman as $b) {
    ?>
    <tr>
        <td><?= $b['Tafel'] ?></td>
        <td><?= $b['Aantal'] ?></td>
        <td><?= $b['Naam'] ?></td>

        <?php
        }
        ?>
    </tbody>
</table>
<br><br>
<a>Dit gaat de barman maken.</a>
</html>