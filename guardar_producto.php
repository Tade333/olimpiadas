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

// Guardar los datos en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_producto = $_POST['tipo_producto'];
    $categoria_producto = $_POST['categoria_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $cuotas = $_POST['cuotas'];
    $oferta = $_POST['oferta'];
    $envio_gratis = $_POST['envio_gratis'];
    $marca_producto = $_POST['marca_producto'];
    $genero_producto = $_POST['genero_producto'];
    $nombre_imagen = $_FILES['imagen_producto']['name'];
    $ruta_imagen = "uploads/" . basename($nombre_imagen);

    // Subir la imagen
    if (move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $ruta_imagen)) {
        $sql = "INSERT INTO productos (tipo_producto, categoria_producto, nombre_producto, precio_producto, cuotas, oferta, envio_gratis, marca_producto, genero_producto, imagen_producto)
                VALUES ('$tipo_producto', '$categoria_producto', '$nombre_producto', '$precio_producto', '$cuotas', '$oferta', '$envio_gratis', '$marca_producto', '$genero_producto', '$ruta_imagen')";

        if ($conn->query($sql) === TRUE) {
            // Redirigir a la página HTML con los datos en la URL
            header("Location: index.php?tipo_producto=$tipo_producto&categoria_producto=$categoria_producto&nombre_producto=$nombre_producto&precio_producto=$precio_producto&cuotas=$cuotas&oferta=$oferta&envio_gratis=$envio_gratis&marca_producto=$marca_producto&genero_producto=$genero_producto&imagen_producto=$nombre_imagen");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>
