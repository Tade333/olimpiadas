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

// Verificar si se ha recibido el parámetro 'genero'
$genero = isset($_GET['genero']) ? $_GET['genero'] : '';

if ($genero) {
    // Filtrar los productos por el género recibido
    $sql = "SELECT * FROM productos WHERE genero_producto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $genero);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $descuento = $row['oferta'] === 'si' ? "-20% Off" : "";
        $precioAntes = $row['oferta'] === 'si' ? "class='price-before'" : "";
        $cuotas = $row['cuotas'] === 'si' ? " 3 Cuotas sin interés de $" . number_format($row['precio_producto'] / 3, 2) : "";
        
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
    echo "<p>No hay productos disponibles.</p>";
}

$stmt->close();
$conn->close();
?>
