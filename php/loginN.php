<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_hk', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST["userN"];
    $contrasena = $_POST["passN"];

    $query = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contrasena = '$contrasena'";

    $resultado = $pdo->query($query);
    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario['usuario'];
        header('Location: ../accediste.html');
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>