<?php

require_once "Coneccion.php";

class ControllerClientes
{

    private $conexion;
    private $conn;

    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->conexion = new Coneccion();
        $this->conn = $this->conexion->getconexion();
    }

    public function getCustomer($id)
    {
        $sql = "SELECT * FROM cliente WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new Cliente(
                $row['ID'],
                $row['nombre'],
                $row['apellido'],
                $row['email'],
                $row['telefono'],
                $row['saldo']
            );
        } else {
            return null;
        }
    }

    public function updateCustomer(Cliente  $cliente)
    {
        $sql = "UPDATE cliente SET nombre = ?, apellido = ?, email = ?, telefono = ?, saldo = ? WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Error preparando la consulta: " . $this->conn->error);
        }
        $nombre = $cliente->getNombre();
        $apellido = $cliente->getApellido();
        $email = $cliente->getEmail();
        $telefono = $cliente->getTelefono();
        $saldo = $cliente->getsaldo();
        $id = $cliente->getId();;
        $stmt->bind_param(
            'ssssdi',
            $nombre,
            $apellido,
            $email,
            $telefono,
            $saldo,
            $id
        );
        $succes = $stmt->execute();
        $stmt->close();

        if ($succes) {
            header("Location: ../../index.php");
            return true;
        } else {
            throw new Exception("Error ejecutando la actualización: " . $stmt->error);
        }
    }

    public function insert(Cliente $cliente)
    {
        $sql = "INSERT INTO cliente (nombre, apellido, email, telefono, saldo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            $nombre = $cliente->getNombre();
            $apellido = $cliente->getApellido();
            $email = $cliente->getEmail();
            $telefono = $cliente->getTelefono();
            $getsaldo = $cliente->getsaldo();
            $stmt->bind_param("sssss",
                $nombre,
                $apellido,
                $email,
                $telefono,
                $getsaldo
            );
            $success = $stmt->execute();
            $stmt->close();

            if ($success) {
                $message = "Usuario ingresado correctamente";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("Location: ../../index.php");
                exit();
            } else {
                throw new Exception("Error al insertar el usuario: " . $this->conn->error);
            }
        } else {
            throw new Exception("Error preparando la consulta: " . $this->conn->error);
        }
    }

    public function getClientes()
    {
        $list = array();

        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $aux = new Cliente(
                    $row['ID'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['email'],
                    $row['telefono'],
                    (float)$row['saldo']
                );
                $list[] = $aux;
            }
        }
        return $list;
    }
}
?>