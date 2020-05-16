<?php

    session_start();

    if (isset($_SESSION['user_id'])) {

        header('Location: /PAJILLAS_TORO');
    }

    require 'database.php';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

            $_SESSION['user_id'] = $results['id'];
            header('Location: /PAJILLAS_TORO');
        }    else {
                $message = 'Lo sentimos, sus credenciales para ingresar no son correctas';
            }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logIn</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    
    <?php require 'partials/header.php' ?> <!-- llama el estilo que tiene la cabecera para cada pagin-->

    <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesión </h1>
    <span>or <a href="signUp.php">SignUp</a></span>

    <form action="logIn.php" method="POST">
        <input type="text" name="email" placeholder="Enter your mail"> <!-- Campo de entrada para ingresar email -->
        <input type="password" name="password" placeholder="Enter your password"> <!-- Campo de entrada para psswrd-->
        <input type="submit" value="Send"> <!-- entrada para ingresar info-->
    </form>

</body>
</html>