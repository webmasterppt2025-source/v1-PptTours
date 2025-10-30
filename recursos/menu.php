<div class="max-w-7xl mx-auto px-4">
    <!-- Primera Fila: Logo y Nombre de la Empresa -->
    <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <div class="flex-shrink-0 mx-auto">
            <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse flex-shrink-0">
                <img src="./imagenes/logo-sin-fondo.png" class="h-8 w-auto" alt="PERU PRIVATE TOURS Logo" />
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
        <ul class="hidden md:flex space-x-8 justify-center">
            <li>
                <a href="../index.php" class="text-gray-700 hover:text-blue-500 font-medium">Inicio</a>
            </li>
            
            <?php if (!empty($categorias)): ?>
                <?php foreach($categorias as $categoria): ?>
                    <li class="relative group">
                        <a href="categoria.php?id=<?php echo $categoria['id']; ?>" 
                           class="text-gray-700 hover:text-blue-500 font-medium flex items-center">
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown según ID de categoría -->
                        <div class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg mt-2 py-2 w-48 z-50">
                            <?php if($categoria['id'] == 1): ?>
                                <!-- Dropdown para Categoría 1 -->
                                <a href="tour-machupicchu.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Machu Picchu Clásico</a>
                                <a href="tour-sacred-valley.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Valle Sagrado</a>
                                <a href="tour-rainbow-mountain.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Montaña de Colores</a>
                                
                            <?php elseif($categoria['id'] == 2): ?>
                                <!-- Dropdown para Categoría 2 -->
                                <a href="tour-lima-moderna.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Lima Moderna</a>
                                <a href="tour-lima-colonial.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Lima Colonial</a>
                                <a href="tour-gastronomico.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Tour Gastronómico</a>
                                
                            <?php elseif($categoria['id'] == 3): ?>
                                <!-- Dropdown para Categoría 3 -->
                                <a href="tour-titicaca.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Lago Titicaca</a>
                                <a href="tour-uros-islands.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Islas Flotantes Uros</a>
                                <a href="tour-sillustani.php" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Chullpas de Sillustani</a>
                                
                            <?php else: ?>
                                <!-- Dropdown genérico para otras categorías -->
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=aventura" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Tours de Aventura</a>
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=cultural" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Tours Culturales</a>
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>&tipo=naturaleza" class="block px-4 py-2 text-gray-700 hover:bg-primary-light">Tours de Naturaleza</a>
                            <?php endif; ?>
                            
                            <!-- Enlace para ver todos los tours de la categoría -->
                            <div class="border-t border-gray-100 mt-1 pt-1">
                                <a href="categoria.php?id=<?php echo $categoria['id']; ?>" 
                                   class="block px-4 py-2 text-primary-dark hover:bg-primary-light font-medium">
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