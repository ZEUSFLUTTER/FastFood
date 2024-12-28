<?php
ob_start();

$id = $_GET['id'];
$conn = new mysqli('localhost', 'root', '', 'fastfood');

$result = $conn->query("SELECT * FROM commande WHERE id = $id AND status = 'pending'");
if ($result->num_rows === 0) {
    die("Commande non trouvée ou déjà validée.");
}

$commande = $result->fetch_assoc();

$client_name = isset($commande['client_name']) ? $commande['client_name'] : 'Inconnu';
$email = isset($commande['email']) ? $commande['email'] : 'Inconnu';
$phone = isset($commande['phone']) ? urlencode($commande['phone']) : '0000000000';
$details = isset($commande['details']) ? $commande['details'] : 'Aucun détail disponible';

$conn->query("UPDATE commande SET status = 'validated' WHERE id = $id");

$whatsappMessage = prepareWhatsappMessage($client_name, $email, $phone, $details, $commande);

$whatsappURL = "https://wa.me/$phone?text=" . urlencode($whatsappMessage);

header("Location: $whatsappURL");
exit();

$conn->close();

function prepareWhatsappMessage($client_name, $email, $phone, $details, $commande) {
    $message = "Bonjour, voici votre commande validée:\n";
    $message .= "Commande #: " . $commande['id'] . "\n";
    $message .= "Nom du client: " . $client_name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Total: " . $commande['total'] . " EUR\n";
    $message .= "Détails: " . $details . "\n";
    $message .= "Merci pour votre achat !";

    return $message;
}
?>
