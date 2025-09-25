<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blog MVC</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <a href="/">Página Principal</a> |
        <a href="/inicio">Inicio</a> |
        <a href="/lenguaje">Mi Lenguaje Favorito</a> |
        <a href="/contactar">Contactar</a>
    </nav>
    <hr>
    <div class="content">
        <?php include($vista); ?>
    </div>
</body>
</html>
