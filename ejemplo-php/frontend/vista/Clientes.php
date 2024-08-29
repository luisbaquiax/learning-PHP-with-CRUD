<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="../css/formulario.css">
</head>
<body>
<div class="container">
    <h1>Formulario de Producto</h1>
    <form>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>

        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" required>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="nuevo">Nuevo</option>
            <option value="usado">Usado</option>
        </select>

        <button type="submit">Enviar</button>
    </form>
</div>
</body>
</html>


