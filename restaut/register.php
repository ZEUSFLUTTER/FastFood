<?php
if (isset($_POST['register'])) {
    // Ajouter la logique pour enregistrer l'utilisateur (par exemple, enregistrer dans une base de données)
    header('Location: login.php'); // Redirige vers la page de connexion après l'enregistrement
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <h2>Créer un compte</h2>
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="submit" name="register" value="S'inscrire">
</form>

<h3>Déjà membre ? <a href="login.php">Se connecter ici</a></h3>
</body>
</html>

