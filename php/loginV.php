<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test_hk', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar y sanitizar datos del formulario
    $username = $_POST['userV'];
    $password = $_POST['passV'];

    // Consulta preparada
    $sql = "SELECT * FROM usuarios WHERE nombre = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el usuario
    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario['usuario'];
        header('Location: ../accediste.html');
    } else {
        echo "Usuario o contraseña incorrectos.";

    }
}
?>
