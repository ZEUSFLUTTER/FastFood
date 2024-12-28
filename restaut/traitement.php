<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'fastfood');

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Vérification de la session utilisateur
    if (!isset($_SESSION['user_id'])) {
        echo "<p>Erreur : L'utilisateur doit être connecté pour passer une commande.</p>";
        echo "<a href='formulaire.php'>Veuillez vous connecter ici</a>";
        exit;
    }
    $user_id = $_SESSION['user_id'];

    // Récupération des données de commande
    $food_name = $_POST['food_name'] ?? null;
    $price = $_POST['price'] ?? null;
    $quantity = $_POST['quantity'] ?? null;

    if (!$food_name || !$price || !$quantity) {
        echo "<p>Erreur : Les données de commande sont incomplètes.</p>";
        exit; // Arrête l'exécution
    }

    $total = $price * $quantity;

    // Insertion dans la table commande
    $stmt = $conn->prepare("INSERT INTO commande (user_id, food_name, price, quantity, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issii", $user_id, $food_name, $price, $quantity, $total);

    if ($stmt->execute()) {
        echo "Commande enregistrée avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
