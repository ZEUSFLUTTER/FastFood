<?php include('header.php'); ?>
<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fastfood');
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}



if (isset($_POST["admin"])) {
    $nom = $_POST['nomadmin'];
    $pass = $_POST['passadmin'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE nom = ? AND pass = ?");
    $stmt->bind_param("ss", $nom, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = true;

        $commandeResult = $conn->query("SELECT * FROM commande WHERE status = 'pending'");
        echo "<h2>Commandes en attente</h2>";
        if ($commandeResult->num_rows > 0) {
            include('commande.php');
            }
            echo "</div>";
        } else {
            echo "<p>Aucune commande en attente.</p>";
        }
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion administrateur</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <div class="container1">
        <h1>Connexion administrateur</h1>

        <form method="post">
            <label for="nomadmin">Nom d'utilisateur:</label><br>
            <input type="text" id="nomadmin" name="nomadmin" required><br>
            <label for="passadmin">Mot de passe:</label><br>
            <input type="password" id="passadmin" name="passadmin" required><br>
            <input type="submit" name="admin" value="Connexion">
        </form>
    </div>
</body>

</html>

<?php include('footer.php'); ?>
