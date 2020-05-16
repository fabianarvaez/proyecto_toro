<?php
    session_start();

    require 'database.php';

    if (isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to your app</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?> <!-- llama el estilo que tiene la cabecera para cada pagin-->

    <?php if (!empty($user)): ?>
        <br> bienvenido. <?= $user['email']; ?>
        <br> Usted ha ingresado de forma correcta
        <a href="logOut.php">
        logOut
        </a>
    <?php else: ?>
        <h1>Por favor ingrese or Registrese! </h1>
        <a href="logIn.php">LogIn</a> or
        <a href="signUp.php">SignUp</a>
    <?php endif; ?>
</body>
</html>
