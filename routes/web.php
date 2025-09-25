<?php
// Página principal
Route::add("/", "BlogController", "index");

// Inicio
Route::add("/inicio", "BlogController", "inicio");

// Mi lenguaje favorito
Route::add("/lenguaje", "BlogController", "lenguaje");

// Contactar
Route::add("/contactar", "BlogController", "contactar");

// Procesar formulario
Route::add("/procesar-contacto", "BlogController", "procesarContacto");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base = str_replace('/public', '', dirname($_SERVER['SCRIPT_NAME']));
$uri = "/" . trim(str_replace($base, '', $uri), "/");
$uri = $uri === "/" ? "/" : $uri;

Route::dispatch($uri);
?>