<?php
class route {
    private static $routes = [];

    public static function add($uri, $controller, $method) {
        self::$routes[$uri] = [$controller, $method];
    }

    public static function dispatch($uri) {
        if (array_key_exists($uri, self::$routes)) {
            [$controller, $method] = self::$routes[$uri];
            $controllerFile = __DIR__ . '/../app/controller/' . $controller . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controllerInstance = new $controller();
                call_user_func([$controllerInstance, $method]);
            } else {
                echo "Controlador $controller no encontrado.";
            }
        } else {
            echo "Ruta no encontrada.";
        }
    }
}
?>