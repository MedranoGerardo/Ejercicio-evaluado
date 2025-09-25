<?php $vista = __FILE__; include __DIR__ . '/layout.php'; ?>
<h2>Formulario de Contacto</h2>

<?php if (!empty($errores)): ?>
    <ul style="color:red;">
        <?php foreach ($errores as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="/procesar-contacto">
    <label>Correo:</label><br>
    <input type="text" name="correo" required><br><br>

    <label>Teléfono:</label><br>
    <input type="text" name="telefono" placeholder="Ej: 71234567" required><br><br>

    <label>DUI:</label><br>
    <input type="text" name="dui" placeholder="Ej: 01234567-8" required><br><br>

    <button type="submit">Enviar</button>
</form>
