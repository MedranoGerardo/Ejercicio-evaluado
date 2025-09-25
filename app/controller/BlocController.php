<?php
class BlogController {
    public function index() {
        require __DIR__ . '/../views/home.php';
    }

    public function inicio() {
        require __DIR__ . '/../views/inicio.php';
    }

    public function lenguaje() {
        require __DIR__ . '/../views/lenguaje.php';
    }

    public function contactar() {
        require __DIR__ . '/../views/contactar.php';
    }

    public function procesarContacto() {
        $errores = [];
        $correo = $_POST['correo'] ?? '';
        $telefono = $_POST['telefono'] ?? '';
        $dui = $_POST['dui'] ?? '';

        if (!preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,6}$/", $correo)) {
            $errores[] = "Correo inválido.";
        }
        if (!preg_match("/^[267][0-9]{7}$/", $telefono)) { 
            $errores[] = "Teléfono inválido.";
        }
        if (!preg_match("/^\d{8}-\d$/", $dui)) { 
            $errores[] = "DUI inválido.";
        }

        if (!empty($errores)) {
            require __DIR__ . '/../views/contactar.php';
        } else {
            echo "<h2> Datos enviados correctamente</h2>";
            echo "<p><b>Correo:</b> $correo</p>";
            echo "<p><b>Teléfono:</b> $telefono</p>";
            echo "<p><b>DUI:</b> $dui</p>";
        }
    }
}
?>