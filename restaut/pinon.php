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
        <h2 class="text-center"><?php echo $recherche; ?> Menu " PINON"</h2>
        <!-- Formulaires de commande -->
        <form action="traitement.php" method="post">
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/Pinon/pinon1.jpeg" alt="Pinon 1" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Pinon Nature</h4>
                    <p class="food-price">$2</p>
                    <p class="food-detail">Une version simple du Pinon, idéal pour accompagner vos sauces togolaises.</p>
                    <label for="quantity">Quantité :</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                    <input type="hidden" name="food_name" value="Pinon Nature">
                    <input type="hidden" name="price" value="2">
                    <br>
                    <button type="submit" class="btn btn-primary">Commander</button>
                </div>
            </div>
        </form>

        <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Pinon/pinon2.jpeg" alt="Pinon 2" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Pinon Épicé</h4>
                        <p class="food-price">$3</p>
                        <p class="food-detail">Pinon légèrement épicé, parfait pour les amateurs de saveurs relevées.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Pinon Épicé">
                        <input type="hidden" name="price" value="3">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Pinon/pinon3.jpeg" alt="Pinon 3" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Pinon au Porc</h4>
                        <p class="food-price">$4</p>
                        <p class="food-detail">Pinon accompagné de porc grillé, une combinaison savoureuse et nourrissante.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Pinon au Poisson">
                        <input type="hidden" name="price" value="4">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Pinon/pinon.jpeg" alt="Pinon 6" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Pinon Végétarien</h4>
                        <p class="food-price">$7</p>
                        <p class="food-detail">Une version végétarienne du Pinon, idéale pour ceux qui privilégient les repas légers.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Pinon Végétarien">
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
