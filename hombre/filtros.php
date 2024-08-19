<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zapatillas para Hombre</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <header>
        <!-- Aquí iría tu barra de navegación y otros elementos del encabezado -->
    </header>

    <div class="carousel-container">
        <div class="carousel-wrapper">
            <div class="carousel" id="carousel">
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tienda";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Obtener parámetros de la URL
                $genero = isset($_GET['genero']) ? $_GET['genero'] : '';
                $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
                $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
                

                // Construir la consulta SQL con los filtros
                $sql = "SELECT * FROM productos WHERE genero_producto = ? AND tipo_producto = ? ";
                
                if (!empty($categoria)) {
                    $sql .= " AND categoria_producto = ? ";
                }

                // Preparar y ejecutar la consulta
                $stmt = $conn->prepare($sql);

                if (!empty($categoria)) {
                    $stmt->bind_param("sss", $genero, $tipo, $categoria);
                } else {
                    $stmt->bind_param("ss", $genero, $tipo);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                // Mostrar los productos filtrados
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
                        if ($descuento) {
                            echo "<p class='price-now'>$ " . number_format($row['precio_producto'] * 0.8, 2) . "</p>"; // Aplica el 20% de descuento
                        }
                        echo "<p class='installments'>$cuotas</p>";
                        echo "<p class='sizes'>Talles disponibles: L, XL, XXL</p>";
                        echo "<button class='add-to-cart'>Agregar al carrito</button>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No hay productos disponibles.</p>";
                }

                $stmt->close();
                $conn->close();

                ?>
            </div>
        </div>
    </div>

    <script src="../index.js"></script>
</body>
</html>
