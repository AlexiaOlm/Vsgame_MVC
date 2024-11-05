<?php
class Users {
    private $numUsuarios;

    public function obtenerUsuarios($conexion) {
        $sql = "SELECT * FROM usuarios";
        $query = $conexion->prepare($sql);
        $query->execute();
        $resul = $query->fetchAll(PDO::FETCH_OBJ);
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nickname</th>";
        echo "<th>Email</th>";
        echo "<th>Imagen</th>";
        echo "<th>Fecha de registro</th>";
        echo "</tr>";
        foreach($resul as $usuario) {
            echo "<tr>";
            echo "<td> $usuario->id </td>";
            echo "<td> $usuario->nickname </td>";
            echo "<td> $usuario->email </td>";
            echo "<td> $usuario->imagen </td>";
            echo "<td> $usuario->fecha_registro </td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function obtenerNumUsuarios($conexion) {
        $sql = "SELECT COUNT(id) AS num_usuarios FROM usuarios;";
        $stmt = $conexion->query($sql);
        $fila = $stmt->fetch();
        $this->numUsuarios = $fila['num_usuarios'];
        $_SESSION['num_usuarios'] = $this->numUsuarios;
        return $this->numUsuarios;
    }

    public function añadirUsuarios($conexion, $nombre, $email, $password) {
        $sql = "INSERT INTO usuarios (nombre, email, password_) VALUES 
        (:nombre, :email, :password_);";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    function editarUsuarios($conexion, $id, $nombre, $email, $password, $imagen) {
        $sql = "UPDATE usuarios SET nickname = :nombre, email = :email, imagen = :imagen, password_ = :pass WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $password);
        if(!empty($imagen)) {
            $stmt->bindParam(':imagen', $imagen);
        }
        $stmt->execute();
    }
}
?>