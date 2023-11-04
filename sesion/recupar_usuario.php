



<?php
include('../mostrar/config/config.php');
$documento = $_POST['documento'];
$pass = $_POST['pass']; // Contraseña proporcionada por el usuario

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios WHERE documento = :documento AND contraseña = :pass";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':pass', $pass);

    $stmt->execute();

    // Verificar si se encontraron registros que coincidan con las credenciales
    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($usuario);
    } else {
        echo"2";
    }
} catch (PDOException $e) {
    echo "Error al iniciar sesión: " . $e->getMessage();
}

// Cerrar la conexión PDO correctamente
$conn = null;
?>
