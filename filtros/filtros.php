<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Document</title>
</head>
<body>
   <header>
   <div class="navbar">
            <div class="logo">
                <img src="logo.jpg" alt="Logo">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit"><img src="search-icon.png" alt="Search"></button>
            </div>
            <div class="menu-icon">
                <img src="menu-icon.png" alt="Menu">
            </div>
        </div>
   </header> 
   

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
$marca = isset($_GET['marca']) ? $_GET['marca'] : '';
$oferta = isset($_GET['ofertas']) ? $_GET['ofertas'] : '';

// Construir la consulta SQL con los filtros
$sql = "SELECT * FROM productos WHERE 1=1";  // 1=1 es una condición siempre verdadera para simplificar la concatenación de condiciones
$params = [];
$types = "";

// Agregar condiciones dependiendo de los parámetros
if (!empty($genero)) {
    $sql .= " AND genero_producto = ?";
    $params[] = $genero;
    $types .= "s";
}

if (!empty($tipo)) {
    $sql .= " AND tipo_producto = ?";
    $params[] = $tipo;
    $types .= "s";
}

if (!empty($categoria)) {
    $sql .= " AND categoria_producto = ?";
    $params[] = $categoria;
    $types .= "s";
}

if (!empty($marca)) {
    $sql .= " AND marca_producto = ?";
    $params[] = $marca;
    $types .= "s";
}

if (isset($_GET['oferta']) && $_GET['oferta'] === 'si') {
    $sql .= " AND oferta = 'si'";
}

// Preparar y ejecutar la consulta
$stmt = $conn->prepare($sql);

// Vincular los parámetros si existen
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
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
        echo "<img src='../" . htmlspecialchars($row['imagen_producto']) . "' alt='" . htmlspecialchars($row['nombre_producto']) . "'>";
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

<footer>
    <p>© 2024 Sports Store. All rights reserved.</p>
</footer>   
</body>
</html>