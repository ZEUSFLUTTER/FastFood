<?php
$host = "localhost";
$name = "root";
$psw = "";
$bd = "fastfood";
$bdd = new mysqli($host, $name, $psw, $bd);

if ($bdd->connect_error) {
    die("Connexion échouée : " . $bdd->connect_error);
}

$food = $bdd->query('SELECT * FROM food');

if (isset($_GET["search"]) && !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    $food = $bdd->query('SELECT * FROM food WHERE nom LIKE "%' . $recherche . '%" ORDER BY nom DESC');
}


if (isset($_GET["search"]) && !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    

    if ($recherche == "Ablo") {
        header("Location: ablo.php");
        exit;
    } elseif ($recherche == "Akoume") {
        header("Location: akoume.php");
        exit;
    } elseif ($recherche == "Riz") {
        header("Location: riz.php");
        exit;
    } elseif ($recherche == "Fufu") {
        header("Location: fufu.php");
        exit;
    } elseif ($recherche == "Pinon") {
        header("Location: pinon.php");
        exit;
    } elseif ($recherche == "Khom") {
        header("Location: khom.php");
        exit;
    } else {

        echo "<h1>Le plat recherché n'est pas disponible.</h1>";
    }
}
?>

 <?php include('header.php'); ?>

    <?php
    if ($food->num_rows > 0) {
        while ($foods = $food->fetch_assoc()) {
        }
    } else {
        echo "<h1>Le plat n'est pas disponible</h1>";
    }
    ?>
    <?php include('footer.php'); ?>
</body>
</html>
