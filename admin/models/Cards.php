<?php
class Cards {
    private $num_cartas;
    private $cartas;
    private $cartaDato;

    function numCartas($conexion) {
        $sql = "SELECT COUNT(id) AS num_cartas FROM cartas;";
        $stmt = $conexion->query($sql);
        $fila = $stmt->fetch();
        $this->num_cartas = $fila['num_cartas'];
        $_SESSION['num_cartas'] = $this->num_cartas;
        return $this->num_cartas;
    }
    
    function id_nombreCartas($conexion) {
        $sql = "SELECT id, nombre FROM cartas";
        $stmt = $conexion->query($sql);
        $this->cartas = $stmt->fetchAll();
        return $this->cartas;
    }
    
    function eliminarCarta($id, $conexion) {
        $sql = "DELETE FROM cartas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function datosCarta($id, $conexion) {
        $sql = "SELECT * FROM cartas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->cartaDato = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $this->cartaDato;
    }

    public function actualizarCarta($conexion, $id, $nombre, $ataque, $defensa, $tipo, $imagen, $poder_especial) {
        $sql = "UPDATE cartas SET nombre = :nombre, ataque = :ataque, defensa = :defensa, tipo = :tipo, imagen = :imagen, poder_especial = :poder_especial WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':ataque', $ataque);
        $stmt->bindParam(':defensa', $defensa);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':poder_especial', $poder_especial);
        $stmt->execute();
    }

    public function insertarCarta($conexion, $nombre, $ataque, $defensa, $tipo, $imagen, $poder_especial) {
        if(!empty($poder_especial) || $poder_especial == null) {
            $sql = "INSERT INTO cartas (nombre, ataque, defensa, tipo, imagen, poder_especial VALUES
            (:nombre, :ataque, :defensa, :tipo, :imagen, :poder_especial);";
        } else {
            $sql = "INSERT INTO cartas (nombre, ataque, defensa, tipo, imagen) VALUES
            (:nombre, :ataque, :defensa, :tipo, :imagen);";
        }
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':ataque', $ataque);
        $statement->bindParam(':defensa', $defensa);
        $statement->bindParam(':tipo', $tipo);
        $statement->bindParam(':imagen', $imagen);
        if(!empty($poder_especial) || $poder_especial == null) {
            $statement->bindParam(':poder_especial', $poder_especial);
        }

        if(!$statement) {
            return "Error al crear el registro";
        } else {
            $statement->execute();
            return "Carta creada correctamente";
        }
    }
}
?>