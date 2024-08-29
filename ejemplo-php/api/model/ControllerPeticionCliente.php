<?php
require_once "ControllerClientes.php";
require_once "Cliente.php";

$controler = new ControllerClientes();

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        session_start();
        unset($_SESSION['cliente']);

        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $name = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $saldo = $_POST['saldo'];

        $customer = new Cliente($id, $name, $apellido, $email, $telefono, $saldo);
        if($id!=0){
            //actualizar cliente
            $controler->updateCustomer($customer);
        }else{
            $controler->insert($customer);
        }
        break;
    case 'GET':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $cliente = ($id != 0) ? $controler->getCustomer($id) : new Cliente(0, '', '', '', '', 0);
        // Pasar el cliente a la vista usando sesiones o directamente en la URL
        session_start();
        $_SESSION['cliente'] = serialize($cliente);

        header("Location: ../../frontend/vista/NuevoCliente.php");
        break;
}


?>