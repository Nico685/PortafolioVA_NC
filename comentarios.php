<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Deja tu comentario</title>
</head>
<body class="text-white" style="background-color: #2d3236;">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="navbar-expand ms-4 m-1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <img src="img/logoSantoTomas.png" height="45" alt="Logo Santo Tomas">
                </li>
                <li class="nav-item me-3">
                    <a href="index.html" class="nav-link text-white">Inicio</a>
                </li>
                <li class="nav-item me-3">
                    <a href="fases.html" class="nav-link text-white">Fases de ataque</a>
                </li>
                <li class="nav-item me-3">
                    <a href="login.html" class="nav-link text-white">Iniciar sesión</a>
                </li>
                <li class="nav-item me-3 border-bottom border-3 border-primary">
                    <a href="comentarios.php" class="nav-link text-primary">Comentarios</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container d-flex mt-5">
        <div class="container mt-5 col-lg-4">
            <h1 class="display-6 mb-4">Deja tu comentario (No validado)</h1>
            <form method="GET" action="">
                <div class="mb-3 text-white">
                    <label for="nombre">Tu nombre:</label>
                    <input class="form-control" type="text" id="nombreSinValidar" name="nombreSinValidar" required>
                </div>
                <div class="mb-3 text-white">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" id="comentarioSinValidar" name="comentarioSinValidar" rows="4" cols="50" required></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <h1 class="display-5 mt-5">Comentarios:</h1>
            <p>
                <!-- Vulnerabilidad: Renderiza directamente el valor del usuario -->
                <?php
                if (isset($_GET['nombreSinValidar']) && isset($_GET['comentarioSinValidar'])) {
                    echo "<strong>" . $_GET['nombreSinValidar'] . ":</strong> " . $_GET['comentarioSinValidar']; // Renderiza sin sanitizar
                }
                ?>
            </p>
        </div>
        <div class="container mt-5 col-lg-4">
            <h1 class="display-6 mb-4">Deja tu comentario (Validado)</h1>
            <form method="GET" action="">
                <div class="mb-3 text-white">
                    <label for="nombre">Tu nombre:</label>
                    <input class="form-control" type="text" id="nombreValidado" name="nombreValidado" required>
                </div>
                <div class="mb-3 text-white">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" id="comentarioValidado" name="comentarioValidado" rows="4" cols="50" required></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
            <h1 class="display-5 mt-5">Comentarios:</h1>
            <p>
                <?php
                    // Mitigación para el segundo bloque
                    if (isset($_GET['nombreValidado']) && isset($_GET['comentarioValidado'])) {
                        echo "<strong>" . htmlspecialchars($_GET['nombreValidado'], ENT_QUOTES, 'UTF-8') . ":</strong> " . htmlspecialchars($_GET['comentarioValidado'], ENT_QUOTES, 'UTF-8'); // Escapa caracteres peligrosos
                    }
                ?>
            </p>
        </div>
    </div>
</body>
</html>