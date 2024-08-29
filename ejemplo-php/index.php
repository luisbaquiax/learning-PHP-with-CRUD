<?php
// Incluir los archivos necesarios
require_once "api/model/ControllerClientes.php";
require_once "api/model/Cliente.php";

$controller = new ControllerClientes();
$list = $controller->getClientes();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="frontend/css/styles.css">
    <title>Document</title>
</head>
<body>
<h1 style="text-align: center">Clientes</h1>
<div style="margin-bottom: 10px">
    <a class="btn btn-primario" href="frontend/vista/NuevoCliente.php">Agregar nuevo cliente</a>
</div>
<table id="customers">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Saldo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php foreach ($list as $cliente): ?>
        <tr>
            <td><?= $cliente->getId() ?></td>
            <td><?= $cliente->getNombre() ?></td>
            <td><?= $cliente->getApellido() ?></td>
            <td><?= $cliente->getEmail() ?></td>
            <td><?= $cliente->getTelefono() ?></td>
            <td><?= $cliente->getSaldo() ?></td>
            <td><a href="api/model/ControllerPeticionCliente.php?id=<?= $cliente->getId() ?>" class="btn btn-primario">Editar</a></td>
            <td><a href="eliminar_cliente.php?id=<?= $cliente->getId() ?>" class="btn btn-red">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
/*require_once 'api/model/ControllerClientes.php';
require_once 'api/model/Cliente.php';
$controllerClientes = new ControllerClientes();
$list = $controllerClientes->getClientes();

echo '<table id="customers">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nombre</th>';
echo '<th>Apellido</th>';
echo '<th>Teléfono</th>';
echo '<th>Email</th>';
echo '<th>Saldo</th>';
echo '<th>Acciones</th>';
echo '</tr>';

foreach ($list as $element) {
    echo '<tr>';
        echo '<td>' . $element->getId() . '</td>';
        echo '<td>' . $element->getNombre() . '</td>';
        echo '<td>' . $element->getApellido() . '</td>';
        echo '<td>' . $element->getTelefono() . '</td>';
        echo '<td>' . $element->getEmail() . '</td>';
        echo '<td>' . $element->getSaldo() . '</td>';
        echo '<td>';
            echo '<form action="api/model/Cliente.php" method="get">';
                echo '<input type="hidden" name="id" value="' . $element->getId() . '">';
                echo '<input type="submit" value="Editar">';
            echo '</form>';
            echo '<a href="frontend/vista/Clientes.php">link</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>';
*/
?>
</body>
</html>
