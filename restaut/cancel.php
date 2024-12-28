<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fastfood');
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}


if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); 
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $stmt = $conn->prepare("DELETE FROM commande WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {

        header("Location: admin.php");
        exit();
    } else {
        echo "Erreur lors de l'annulation de la commande.";
    }
} else {
    echo "Aucune commande à annuler.";
}

?>
