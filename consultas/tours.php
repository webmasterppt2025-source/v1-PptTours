<?php
require_once 'conexion.php';

function obtenerToursPorCategoria($categoria_id) {
    global $db;
    
    $conexion = $db->getConexion();
    $tours = [];
    
    $sql = "SELECT nombre, enlace_slug FROM tours WHERE categoria_id = ? ";
    
    try {
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $categoria_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tours[] = [
                    'nombre' => $row['nombre'],
                    'enlace_slug' => $row['enlace_slug']
                ];
            }
            $result->free();
        }
        
        $stmt->close();
        return $tours;
        
    } catch (Exception $e) {
        error_log("Error en obtenerToursPorCategoria: " . $e->getMessage());
        return [];
    }
}
?>