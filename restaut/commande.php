<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class='commande-list'>
        <?php

        if ($commandeResult->num_rows > 0) {
            echo "<table class='commande-table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID Commande</th>";
            echo "<th>Nom de la Nourriture</th>";
            echo "<th>Total (€)</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $commandeResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['food_name'] . "</td>";
                echo "<td>" . $row['total'] . "€</td>";
                echo "<td><a href='validate.php?id=" . $row['id'] . "' class='validate'>Valider</a> | <a href='cancel.php?id=" . $row['id'] . "' class='cancel'>Annuler</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Aucune commande en attente.</p>";
        }
        ?>
    </div>
</body>

</html>