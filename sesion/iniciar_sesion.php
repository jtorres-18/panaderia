<?php
include('../mostrar/config/config.php');
$registrado = $_POST['usuario'];
$pass = $_POST['pass']; // Contraseña proporcionada por el usuario

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contraseña = :pass";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':usuario', $registrado);
    $stmt->bindParam(':pass', $pass);

    $stmt->execute();

    // Verificar si se encontraron registros que coincidan con las credenciales
    if ($stmt->rowCount() == 1) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['usuario'] = $registrado; // Puedes almacenar información del usuario en la sesión si es necesario
        $_SESSION['entro'] = true;
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($usuario);
    } else {

        // Credenciales incorrectas
        echo"2";
    }
} catch (PDOException $e) {
    echo "Error al iniciar sesión: " . $e->getMessage();
}

// Cerrar la conexión PDO correctamente
$conn = null;
?>
