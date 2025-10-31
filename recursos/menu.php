<?php
require_once 'consultas/menu_data.php';

$datosMenu = obtenerDatosMenuCompleto();

// DEBUG DIRECTO
echo "<!-- DEBUG: datosMenu count = " . count($datosMenu) . " -->";

if (empty($datosMenu)) {
    echo "<!-- DEBUG: datosMenu está VACÍO -->";
    
    // Verifica si hay error en la conexión
    require_once 'consultas/categorias.php';
    $categoriasDirectas = obtenerCategorias();
    echo "<!-- DEBUG: categoriasDirectas count = " . count($categoriasDirectas) . " -->";
}
?>


<div class="max-w-7xl mx-auto px-4">
    <!-- Primera Fila: Logo y Nombre de la Empresa -->
    <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="shrink-0 mx-auto">
            <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse shrink-0">
                <img src="./imagenes/logo-sin-fondo.png" class="h-8 w-auto" alt="PERU PRIVATE TOURS Log o" />
                <span class="self-left text-xl font-semibold whitespace-nowrap text-gray-900">PERU PRIVATE TOURS</span>
            </a>
        </div>

        <!-- Botón menú móvil -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Segunda Fila: Menú de Navegación -->
    <div class="border-t border-gray-200 pt-4">
        <!-- Menú de categorías - ESCRITORIO -->
        <ul class="hidden md:flex space-x-8 justify-center relative"> 
            <li>
                <a href="../index.php" class="text-gray-700 hover:text-blue-500 font-medium">Inicio</a>
            </li>
            
            <?php if (!empty($datosMenu)): ?>
                <?php foreach($datosMenu as $item): ?>
                    <?php $categoria = $item['categoria']; ?>
                    <?php $tours = $item['tours']; ?>
                    <li class="group">
                        <a href="categoria.php?id=<?php echo $categoria['id']; ?>" 
                        class="text-gray-700 hover:text-blue-500 font-medium flex items-center relative z-10"> 
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown POSICIONADO DEBAJO DEL MENÚ -->
                        <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-lg py-4 w-screen z-50 border border-gray-100 left-1/2 transform -translate-x-1/2 top-full">
                            
                            <div class="max-w-7xl mx-auto px-6">
                                <?php if (!empty($tours)): ?>
                                    <!-- Dropdown DINÁMICO con tours desde la base de datos -->
                                    <div class="grid grid-cols-3 gap-6">
                                        <?php foreach($tours as $tour): ?>
                                            <a href="tour.php?slug=<?php echo $tour['enlace_slug']; ?>" 
                                            class="flex py-4 px-4 hover:bg-primary-light rounded-lg transition-colors">
                                                <div class="overflow-hidden flex-1">
                                                    <p class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($tour['nombre']); ?>
                                                    </p>
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        <?php echo htmlspecialchars($tour['descripcion_corta'] ?? 'Tour exclusivo'); ?>
                                                    </p>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <!-- Mensaje si no hay tours -->
                                    <div class="text-center py-8">
                                        <p class="text-gray-500">Próximamente nuevos tours</p>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Enlace para ver todos los tours de la categoría -->
                                <div class="border-t border-gray-100 mt-6 pt-4 text-center">
                                    <a href="categoria.php?id=<?php echo $categoria['id']; ?>" 
                                    class="inline-flex items-center justify-between group px-6 py-2 bg-primary-light hover:bg-primary rounded-lg transition-colors">
                                        <span class="text-sm font-medium text-primary-dark group-hover:text-white transition-colors">
                                            Ver Todos los Tours de <?php echo htmlspecialchars($categoria['nombre']); ?>
                                        </span>
                                        <svg class="w-4 h-4 text-primary-dark group-hover:text-white group-hover:translate-x-1 transition-all ml-2" 
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>
                    <span class="text-gray-400">No hay categorías</span>
                </li>
            <?php endif; ?>
            
            <li>
                <a href="contacto.php" class="text-gray-700 hover:text-blue-500 font-medium">Contacto</a>
            </li>
        </ul>
    </div>

    <!-- Menú MÓVIL -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg rounded-lg mt-2 py-4 px-4">
        <ul class="space-y-4">
            <li>
                <a href="../index.php" class="block text-gray-700 hover:text-blue-500 font-medium py-2">Inicio</a>
            </li>
            
            <?php if (!empty($categorias)): ?>
                <?php foreach($categorias as $categoria): ?>
                    <li>
                        <button class="mobile-dropdown-toggle flex justify-between items-center w-full text-gray-700 hover:text-blue-500 font-medium py-2 text-left">
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                            <svg class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div class="mobile-dropdown-content hidden pl-4 mt-2 space-y-2 border-l-2 border-primary-light">
                            <?php if($categoria['id'] == 1): ?>
                                <a href="tour-machupicchu.php" class="block text-gray-600 hover:text-blue-500 py-1">Machu Picchu Clásico</a>
                                <a href="tour-sacred-valley.php" class="block text-gray-600 hover:text-blue-500 py-1">Valle Sagrado</a>
                                <a href="tour-rainbow-mountain.php" class="block text-gray-600 hover:text-blue-500 py-1">Montaña de Colores</a>
                                
                            <?php elseif($categoria['id'] == 2): ?>
                                <a href="tour-lima-moderna.php" class="block text-gray-600 hover:text-blue-500 py-1">Lima Moderna</a>
                                <a href="tour-lima-colonial.php" class="block text-gray-600 hover:text-blue-500 py-1">Lima Colonial</a>
                                <a href="tour-gastronomico.php" class="block text-gray-600 hover:text-blue-500 py-1">Tour Gastronómico</a>
                                
                            <?php elseif($categoria['id'] == 3): ?>
                                <a href="tour-titicaca.php" class="block text-gray-600 hover:text-blue-500 py-1">Lago Titicaca</a>
                                <a href="tour-uros-islands.php" class="block text-gray-600 hover:text-blue-500 py-1">Islas Flotantes Uros</a>
                                <a href="tour-sillustani.php" class="block text-gray-600 hover:text-blue-500 py-1">Chullpas de Sillustani</a>
                                
                            <?php else: ?>
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=aventura" class="block text-gray-600 hover:text-blue-500 py-1">Tours de Aventura</a>
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=cultural" class="block text-gray-600 hover:text-blue-500 py-1">Tours Culturales</a>
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=naturaleza" class="block text-gray-600 hover:text-blue-500 py-1">Tours de Naturaleza</a>
                            <?php endif; ?>
                            
                            <div class="border-t border-gray-200 mt-2 pt-2">
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>" 
                                   class="block text-primary-dark hover:text-blue-500 font-medium py-1">
                                    Ver Todos
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>
                    <span class="text-gray-400">No hay categorías</span>
                </li>
            <?php endif; ?>
            
            <li>
                <a href="contacto.php" class="block text-gray-700 hover:text-blue-500 font-medium py-2">Contacto</a>
            </li>
        </ul>
    </div>
</div>

<script>
    // Funcionalidad para el menú móvil
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Funcionalidad para los dropdowns móviles
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('svg');
            
            // Alternar visibilidad del contenido
            content.classList.toggle('hidden');
            
            // Rotar ícono
            icon.classList.toggle('rotate-180');
        });
    });

    // Cerrar menú móvil al hacer clic fuera de él
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        
        if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>