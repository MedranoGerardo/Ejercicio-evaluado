<?php

spl_autoload_register(function ($clase) {
    // Carpetas para buscar las clases
    $paths = [
        __DIR__ . "/app/controller/",
        __DIR__ . "/app/models/",
        __DIR__ . "/lib/"
    ];

    $found = false;

    foreach ($paths as $path) {
        $ruta = $path . $clase . ".php";
        if (file_exists($ruta)) {
            require_once($ruta);
            $found = true;
            break;
        }
    }

    if (!$found) {
        die("No se pudo cargar la clase: $clase");
    }
});

?>
