<?php
class ConfigM {
    public function actualizarConfiguracion($conexion, $clave, $valor) {
        $sql = "UPDATE configuracion SET valor = :valor WHERE clave = :clave";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
    }

    public function mostrarConfiguracion($conexion) {
        $sql = "SELECT * FROM configuracion";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $configuracion = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border=1>";
        echo "<tr>";
        echo "<th> Clave </th>";
        echo "<th> Valor </th>";
        echo "</tr>";
        foreach($configuracion as $dato) {
            echo "<tr>";
            echo "<td> $dato[clave] </td>";
            echo "<td> $dato[valor] </td>";
            echo "</tr>";
        }
    }

    function configuracionActual($conexion) {
        $sql = "SELECT * FROM configuracion";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $configuracion = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($configuracion as $dato) {
            echo "<br>";
            echo "$dato[clave]: $dato[valor]  ";
        }
    }
}
?>