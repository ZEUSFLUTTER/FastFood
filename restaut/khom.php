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
    if ($recherche == "Khom" || $recherche == "khom") {
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

<!-- <section class="food-menu"> -->
    <div class="container">
        <h2 class="text-center"><?php echo $recherche; ?> Menu "KHOM"</h2>
        <!-- Formulaires de commande -->
        <form action="traitement.php" method="post">
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/Khom/khom1.jpeg" alt="Khom 1" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h4>Khom Nature</h4>
                    <p class="food-price">$2</p>
                    <p class="food-detail">Une version simple de Khom, doux et léger.</p>
                    <label for="quantity">Quantité :</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                    <input type="hidden" name="food_name" value="Khom Nature">
                    <input type="hidden" name="price" value="2">
                    <br>
                    <button type="submit" class="btn btn-primary">Commander</button>
                </div>
            </div>
        </form>

        <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Khom/khom2.jpeg" alt="Khom 2" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Khom Épicé</h4>
                        <p class="food-price">$3</p>
                        <p class="food-detail">Khom légèrement épicé, parfait pour les amateurs de saveurs relevées.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Khom Épicé">
                        <input type="hidden" name="price" value="3">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Khom/khom3.jpeg" alt="Khom 3" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Khom au Poisson</h4>
                        <p class="food-price">$4</p>
                        <p class="food-detail">Khom accompagné de poisson grillé, une combinaison savoureuse et nourrissante.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Khom au Poisson">
                        <input type="hidden" name="price" value="4">
                        <br>
                        <button type="submit" class="btn btn-primary">Commander</button>
                    </div>
                </div>
            </form>

            <form action="traitement.php" method="post">
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/Khom/khom6.jpeg" alt="Khom 6" class="img-responsive img-curve">
                    </div>
                    <div class="food-menu-desc">
                        <h4>Khom Végétarien</h4>
                        <p class="food-price">$7</p>
                        <p class="food-detail">Une version végétarienne de Khom, idéale pour ceux qui privilégient les repas légers.</p>
                        <label for="quantity">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                        <input type="hidden" name="food_name" value="Khom Végétarien">
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
