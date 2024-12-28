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

// Définir la variable $recherche ici pour éviter l'erreur.
$recherche = '';

if (isset($_GET["search"]) && !empty($_GET['search'])) {
    $recherche = htmlspecialchars($_GET['search']);
    $food = $bdd->query('SELECT * FROM food WHERE nom LIKE "%' . $recherche . '%" ORDER BY nom DESC');
}

// Vérification de la recherche pour la redirection
if (!empty($recherche)) {
    if ($recherche == "Ablo" || $recherche == "ablo") {
        header("Location: ablo.php");
        exit;
    } elseif ($recherche == "Akoume" || $recherche == "akoume") {
        header("Location: akoume.php");
        exit;
    } elseif ($recherche == "Riz" || $recherche == "riz") {
        header("Location: riz.php");
        exit;
    } elseif ($recherche == "Fufu" || $recherche == "fufu") {
        header("Location: fufu.php");
        exit;
    } elseif ($recherche == "Pinon" || $recherche == "pinon") {
        header("Location: pinon.php");
        exit;
    } elseif ($recherche == "Khom" || $recherche == "khom") {
        header("Location: khom.php");
        exit;
    } else {
        // Si aucun plat ne correspond à la recherche
        echo "<h1>Le plat recherché n'est pas disponible.</h1>";
    }
}
?>

<?php include('header.php'); ?>

<section class="food-search text-center">
    <div class="container">
        <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $recherche; ?>"</a></h2>
    </div>
</section>

<section>
    <?php
    if ($food->num_rows > 0) {
        while ($foods = $food->fetch_assoc()) {
            // Affichage des résultats ici
        }
    } else {
        echo "<h1>Le plat n'est pas disponible</h1>";
    }
    ?>
</section>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center"><?php echo $recherche; ?> Menu "RIZ"</h2>
        <!-- Formulaires de commande -->
        <form action="traitement.php" method="post">
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/Riz/riz1.jpeg" alt="Riz 1" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Riz Nature</h4>
                    <p class="food-price">$2</p>
                    <p class="food-detail">Riz blanc nature, parfait pour accompagner tous vos plats.</p>
                    <label for="quantity">Quantité :</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                    <input type="hidden" name="food_name" value="Riz Nature">
                    <input type="hidden" name="price" value="2">
                    <br>
                    <button type="submit" class="btn btn-primary">Commander</button>
                </div>
            </div>
        </form>

        <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Riz/riz2.jpeg" alt="Riz 2" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Riz au Poulet</h4>
                        <p class="food-price">$3</p>
                        <p class="food-detail">Riz accompagné de poulet grillé savoureux, un plat classique.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Riz au Poulet">
                        <input type="hidden" name="price" value="3">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Riz/riz3.jpeg" alt="Riz 3" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Riz aux Fruits de Mer</h4>
                        <p class="food-price">$4</p>
                        <p class="food-detail">Riz accompagné de fruits de mer frais, une explosion de saveurs marines.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Riz aux Fruits de Mer">
                        <input type="hidden" name="price" value="4">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Riz/riz6.jpeg" alt="Riz 6" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Riz aux Légumes</h4>
                        <p class="food-price">$7</p>
                        <p class="food-detail">Un riz aux légumes colorés et savoureux, parfait pour les végétariens.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Riz aux Légumes">
                        <input type="hidden" name="price" value="7">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>
        <!-- Ajoutez d'autres plats à afficher -->
        <div class="clearfix"></div>
    </div>
</section>

<?php include('footer.php'); ?>
</body>
</html>
