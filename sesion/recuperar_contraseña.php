<?php
include('../mostrar/config/config.php');
$email = $_POST['correo'];
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios WHERE correo = :correo ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $email);
    $stmt->execute();

    // Verificar si se encontraron registros que coincidan con las credenciales
    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($usuario);
    } else {
        echo "2";
    }
} catch (PDOException $e) {
    echo "Error al iniciar sesión: " . $e->getMessage();
}

// Cerrar la conexión PDO correctamente
$conn = null;
?>
