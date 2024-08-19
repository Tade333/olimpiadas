<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Store</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.jpg" alt="Logo">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit"><img src="lupa.png" alt="Search"></button>
            </div>
            <div class="menu-icon">
                <img src="3puntos.webpp.webp" alt="Menu">
            </div>
        </div>
       <nav>
    <ul>
        <li><a href="#">Ofertas</a></li>
        <li><a href="#">Marcas</a></li>
        <li><a href="#">Deportes</a></li>
        <li class="dropdown">
            <a href="hombre/hombre.php?genero=hombre" class="dropbtn">Hombre</a>
            <div class="dropdown-content">
            <div class="dropdown-submenu">
                <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria">Indumentaria</a>
                <div class="submenu-content">
                        <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria&categoria=remeras">Remeras</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria&categoria=pantalones">Pantalones</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria&categoria=camperas">Camperas</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria&categoria=buzos">Buzos</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=indumentaria&categoria=mallas">Mallas</a>
                    </div>
                </div>
                <div class="dropdown-submenu">
                    <a href="hombre/filtros.php?genero=hombre&tipo=zapatillas" class="dropbtn">Zapatillas</a>
                    <div class="submenu-content">
                        <a href="hombre/filtros.php?genero=hombre&tipo=zapatillas&categoria=running">Running</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=zapatillas&categoria=training">Training</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=zapatillas&categoria=urban">Urban</a>
                    </div>
                </div>
                <div class="dropdown-submenu">
                <a href="hombre/accesorios.html?genero=hombre">Accesorios</a>
                <div class="submenu-content">
                        <a href="hombre/filtros.php?genero=hombre&tipo=accesorios&categoria=mochilas">Mochilas</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=accesorios&categoria=guantes">Guantes</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=accesorios&categoria=gorros/gorras">Gorros/Gorras</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=accesorios&categoria=bolsos">Bolsos</a>
                        <a href="hombre/filtros.php?genero=hombre&tipo=accesorios&categoria=medias">Medias</a>
                    </div>
               </div>
                <a href="hombre/sandalias.html?genero=hombre&tipo=sandalias">Sandalias</a>
            </div>
        </li>
        <li><a href="#">Mujer</a></li>
        <li><a href="#">Niños</a></li>
    </ul>
</nav>
    </header>

    <div class="carousel-container">
        <!-- Flecha Izquierda, inicialmente oculta -->
        

        <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
        <!-- Aquí va tu formulario -->
        <!-- Campo de tipo de producto -->
        <label for="tipo_producto">¿Qué tipo de producto es?</label>
        <select id="tipo_producto" name="tipo_producto" onchange="mostrarOpciones()">
            <option value="">Seleccione una opción</option>
            <option value="indumentaria">Indumentaria</option>
            <option value="deporte">Productos de deporte</option>
        </select>

        <!-- Sección común para ambos tipos de productos -->
        <div id="opciones_producto" style="display: none;">
            <label for="categoria_producto">Seleccione la categoría</label>
            <select id="categoria_producto" name="categoria_producto">
                <option value="pantalon">Pantalón</option>
                <option value="zapatillas">Zapatillas</option>
                <option value="remeras">Remeras</option>
                <option value="medias">Medias</option>
                <option value="futbol">Fútbol</option>
                <option value="basquet">Básquet</option>
                <option value="rugby">Rugby</option>
            </select>

            <!-- Nombre, Imagen, Precio -->
            <br>
            <label for="nombre_producto">Nombre del producto</label>
            <input type="text" id="nombre_producto" name="nombre_producto" required>
            <br>
            <label for="imagen_producto">Imagen del producto</label>
            <input type="file" id="imagen_producto" name="imagen_producto" accept="image/*" required>
            <br>
            <label for="precio_producto">Precio</label>
            <input type="number" id="precio_producto" name="precio_producto" required>

            <br>
            <label for="cuotas">¿Ofrece cuotas?</label>
            <select id="cuotas" name="cuotas">
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>
            <br>
            <label for="oferta">¿Está en oferta?</label>
            <select id="oferta" name="oferta">
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>
            <br>
            <label for="envio_gratis">¿Ofrece envío gratis?</label>
            <select id="envio_gratis" name="envio_gratis">
                <option value="no">No</option>
                <option value="si">Sí</option>
            </select>
            <br>
            <label for="marca_producto">Marca</label>
            <select id="marca_producto" name="marca_producto">
                <option value="nike">Nike</option>
                <option value="adidas">Adidas</option>
                <option value="puma">Puma</option>
            </select>
            <br>
            <label for="genero_producto">Género</label>
            <select id="genero_producto" name="genero_producto">
                <option value="hombre">Hombre</option>
                <option value="mujer">Mujer</option>
                <option value="unisex">Unisex</option>
                <option value="niños">Niños</option>
                <option value="no_aplica">No aplica</option>
            </select>
            <br>
            <input type="submit" value="Guardar Producto">
        </div>
        
    </form>
   
    <h2 id="titulo">Ofertas destacadas</h2>
    <script>
        function mostrarOpciones() {
            var tipoProducto = document.getElementById('tipo_producto').value;
            // Mostrar u ocultar las opciones cuando se seleccione un tipo de producto
            document.getElementById('opciones_producto').style.display = tipoProducto ? 'block' : 'none';
        }
        function mostrarOpciones() {
        var tipoProducto = document.getElementById('tipo_producto').value;
        var categoriaSelect = document.getElementById('categoria_producto');
        var next1 = document.getElementById('next1');
        var opcionesProducto = document.getElementById('opciones_producto');

        categoriaSelect.innerHTML = ''; // Limpiar opciones previas

        if (tipoProducto) {
            opcionesProducto.style.display = 'block';
            next1.disabled = false;

            if (tipoProducto === 'indumentaria') {
                agregarOpcionesCategoria(['Remeras', 'Pantalones', 'Camperas', 'Buzos', 'Mallas']);
            } else if (tipoProducto === 'zapatillas') {
                agregarOpcionesCategoria(['Running', 'Training', 'Urban']);
            } else if (tipoProducto === 'accesorios') {
                agregarOpcionesCategoria(['Mochilas', 'Guantes', 'Gorros/Gorras', 'Bolsos', 'Medias']);
            } else if (tipoProducto === 'sandalias') {
                opcionesProducto.style.display = 'none'; // No mostrar categorías
            } else if (tipoProducto === 'deporte') {
                agregarOpcionesCategoria(['Fútbol', 'Básquet', 'Rugby']);
            }
        } else {
            opcionesProducto.style.display = 'none';
            next1.disabled = true;
        }
    }

    function agregarOpcionesCategoria(opciones) {
        var categoriaSelect = document.getElementById('categoria_producto');
        opciones.forEach(function (opcion) {
            var optionElement = document.createElement('option');
            optionElement.value = opcion.toLowerCase();
            optionElement.textContent = opcion;
            categoriaSelect.appendChild(optionElement);
        });
    }

    function activarSiguiente() {
        var next2 = document.getElementById('next2');
        var categoriaProducto = document.getElementById('categoria_producto').value;
        if (categoriaProducto) {
            next2.disabled = false;
        } else {
            next2.disabled = true;
        }
    }
    </script>
   

        <!-- Área visible del carrusel -->
        <div class="carousel-container">
        <button class="arrow left-arrow" id="leftArrow" onclick="moveCarousel(-1)">&#8249;</button>

            <div class="carousel-wrapper">
                <div class="carousel" id="carousel">
                    <?php
                    // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "productos";
    
                    $conn = new mysqli($servername, $username, $password, $dbname);
    
                    // Verificar la conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
    
                    // Obtener todos los productos guardados
                    $sql = "SELECT * FROM productos";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $descuento = $row['oferta'] === 'si' ? "-20% Off" : "";
                            $precioAntes = $row['oferta'] === 'si' ? "class='price-before'" : "";
                            $cuotas = $row['cuotas'] === 'si' ? " 3 Cuotas sin interés de $" . number_format($row['precio_producto']/3, 2) : "";
                            
                            echo "<div class='carousel-item'>";
                            if ($descuento) {
                                echo "<div class='discount'>$descuento</div>";
                            }
                            echo "<img src='" . htmlspecialchars($row['imagen_producto']) . "' alt='" . htmlspecialchars($row['nombre_producto']) . "'>";
                            echo "<h3>" . htmlspecialchars($row['nombre_producto']) . "</h3>";
                            echo "<p $precioAntes>$ " . number_format($row['precio_producto'], 2) . "</p>";
                            echo "<p class='price-now'>$ " . number_format($row['precio_producto'] * 0.8, 2) . "</p>"; // Aplica el 20% de descuento
                            echo "<p class='installments'>$cuotas</p>";
                            echo "<p class='sizes'>Talles disponibles: L, XL, XXL</p>";
                            echo "<button class='add-to-cart'>Agregar al carrito</button>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>No hay productos guardados.</p>";
                    }
    
                    $conn->close();
                    ?>
                </div>
            </div>
            <button class="arrow right-arrow" id="rightArrow" onclick="moveCarousel(1)">&#8250;</button>
        </div>

        <!-- Flecha Derecha -->
        
        <div class="carrusel">
        <div class="carrusel-items">
            <a href="guardar_producto.php" ><img src="nike.jpg" alt="Imagen 1" class="item" ></a>
            <a href="#"><img src="adidas.png" alt="Imagen 2" class="item" ></a>
            <a href="#"><img src="crocs.jpg" alt="Imagen 3" class="item"></a>
            <a href="#"><img src="converse.png" alt="Imagen 4" class="item"></a>
            <a href="#"><img src="nb.jpg" alt="Imagen 5" class="item"></a>
            <a href="#"><img src="polo.jpg" alt="Imagen 6" class="item"></a>
            <a href="#"><img src="topper.jpg" alt="Imagen 7" class="item"></a>
            
            <a href="#"><img src="puma.png" alt="Imagen 8" class="item"></a>
            
        </div>
    </div>
    <script src="index.js"></script>
<script> 
   // script.js
let currentIndex = 0;
const items = document.querySelectorAll('.carrusel .item');
const totalItems = items.length;
const itemsToShow = 4; // Cantidad de imágenes a mostrar
const itemWidth = 150; // Ancho de cada imagen

function showNextItems() {
    currentIndex = (currentIndex + 1) % (totalItems - itemsToShow + 1); // Incrementar el índice
    const offset = -currentIndex * itemWidth; // Calcular el desplazamiento
    document.querySelector('.carrusel-items').style.transform = `translateX(${offset}px)`; // Aplicar el desplazamiento
}

// Cambiar automáticamente cada 3 segundos
setInterval(showNextItems, 3000);
</script>
    

    <footer>
        <p>© 2024 Sports Store. All rights reserved.</p>
    </footer>
</body>
</html>
