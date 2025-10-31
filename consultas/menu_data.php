<?php
require_once 'categorias.php';
require_once 'tours.php';

function obtenerDatosMenuCompleto() {
    $categorias = obtenerCategorias();
    $datosMenu = [];
    
    foreach ($categorias as $categoria) {
        $tours = obtenerToursPorCategoria($categoria['id']);
        $datosMenu[] = [
            'categoria' => $categoria,
            'tours' => $tours
        ];
    }
    
    return $datosMenu;
}
?>