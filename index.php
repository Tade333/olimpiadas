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
                <li><a href="#">Hombre</a></li>
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
  <div class="carrusel-contenido">
    <div class="marca"><img src="adidas.png" alt="Marca 1"></div>
    <div class="marca"><img src="converse.png" alt="Marca 2"></div>
    <div class="marca"><img src="puma.png" alt="Marca 3"></div>
    <!-- Agrega más marcas según sea necesario -->
  </div>
</div>
<script> 
    let index = 0; // Índice inicial
const marcas = document.querySelectorAll('.marca'); // Selecciona todas las marcas
const totalMarcas = marcas.length; // Total de marcas

function mostrarMarca() {
  // Calcula el desplazamiento
  const desplazamiento = -index * 100; // 100% por cada marca
  document.querySelector('.carrusel-contenido').style.transform = `translateX(${desplazamiento}%)`;
  
  // Incrementa el índice
  index = (index + 1) % totalMarcas; // Vuelve al inicio al llegar al final
}

// Cambia de marca cada 3 segundos
setInterval(mostrarMarca, 3000);
</script>
    <script src="index.js"></script>

    <footer>
        <p>© 2024 Sports Store. All rights reserved.</p>
    </footer>
</body>
</html>
