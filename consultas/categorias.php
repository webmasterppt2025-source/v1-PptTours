<?php
function obtenerCategorias() {
    require_once 'conexion.php';
    
    global $db;
    
    $conexion = $db->getConexion();
    $categorias = [];
    
    $sql = "SELECT id, nombre FROM categorias";
    
    try {
        $result = $conexion->query($sql);
        
        if (!$result) {
            return [];
        }
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $categorias[] = [
                    'id' => $row['id'],
                    'nombre' => $row['nombre']
                ];
            }
            $result->free();
        }
        
        return $categorias;
        
    } catch (Exception $e) {
        error_log("Error en obtenerCategorias: " . $e->getMessage());
        return [];
    }
}
?>