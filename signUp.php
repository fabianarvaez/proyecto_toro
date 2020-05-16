<?php
    require 'database.php'; // requiere desde la clase datab... enlazar la cionexión 

    $message = ''; // variable global

    if (!empty($_POST['email']) && !empty($_POST['password'])) { // si los campos que se están recibiendo dentro del método post no están vacios 
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";// creamos variable $sql para agregar datos a la DB en los campos (email, password), a traves de variables q interpolan (:email, :password)
        $stmt = $conn->prepare($sql); // variable stmt vamos a decirle q con la variable$conn que le vamos a enrutar una consulta pasamdole la consulta a traves de la variable $sql de arriba.
        $stmt->bindParam(':email', $_POST['email']); //vamos a vincular a traves del metodo binparam donde lee la variable que inerpola y q pasa a ser un string ':email' y q recibe desde el metodo Post a traves de el atributo email
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // antees de guardar el psswrd la ciframos para q no se vean, 
        $stmt->bindParam(':password', $password); //aqui almacenamos los valores de passwd pero ya alamcenamos el dato encriptado.

        if ($stmt->execute()) {
            $message = 'El usuario se ha creado satisfactoriamente.';
        } else {
            $message = 'Lo sentimos ha ocurrido un imprevistoy no se ha creado su cuenta de usuario, intentelo de nuevo.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Muestras Toro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php require 'partials/header.php' ?> <!-- llama el estilo que tiene la cabecera para cada pagin-->
    
    <?php if(!empty($message)):?> <!-- verifica si hay mensaje desde la carga de datos
        <p> <?= $message ?> </p> trae mensaje desde iterior de carga de datos verifiando estado de la transacción -->
    <?php endif; ?>


    <h1>REgistre nuevo usuario</h1>
    <span>or <a href="logIn.php">LogIn</a></span>

    <form action="signUp.php" method="post">
        <input type="text" name="email" placeholder="Enter your mail"> <!-- Campo de entrada para ingresar email -->
        <input type="password" name="password" placeholder="Enter your password"> <!-- Campo de entrada para psswrd-->
        <input type="password" name="confirm_password" placeholder="Confirm your password"> <!-- Campo de entrada para psswrd-->
        <input type="submit" value="Send"> <!-- entrada para ingresar info-->
    </form>

</body>
</html>