<?php
include("conexion.php");

// Seleccionar solo las columnas que necesitas
$sql = "SELECT id, nombre FROM categorias ";
$result = $conexion->query($sql);

$categorias = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Guardar solo id y nombre en el array
        $categorias[] = [
            'id' => $row['id'],
            'nombre' => $row['nombre']
        ];
    }
}

$conexion->close();
?>