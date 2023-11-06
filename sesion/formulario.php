<?php
include('../mostrar/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $email = $_POST["email"];
    $usuari = $_POST["usuario"];
    $pass = $_POST["pass"];
    $tipo_usuario= 1 ;

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Consulta para verificar si el correo ya existe en la base de datos
$queryEmail = "SELECT correo FROM usuarios WHERE correo = :email";
$stmtEmail = $conn->prepare($queryEmail);
$stmtEmail->bindParam(':email', $email);
$stmtEmail->execute();

// Consulta para verificar si el usuario ya existe en la base de datos
$queryUsuario = "SELECT usuario FROM usuarios WHERE usuario = :usuari";
$stmtUsuario = $conn->prepare($queryUsuario);
$stmtUsuario->bindParam(':usuari', $usuari);
$stmtUsuario->execute();

// Consulta para verificar si el documento ya existe en la base de datos
$queryDocumento = "SELECT documento FROM usuarios WHERE documento = :documento";
$stmtDocumento = $conn->prepare($queryDocumento);
$stmtDocumento->bindParam(':documento', $documento);
$stmtDocumento->execute();

if ($stmtEmail->rowCount() > 0 || $stmtUsuario->rowCount() > 0 || $stmtDocumento->rowCount() > 0) {
    if ($stmtEmail->rowCount() > 0) {
        echo '2';
    } elseif ($stmtUsuario->rowCount() > 0) {
        echo '4';
    } elseif ($stmtDocumento->rowCount() > 0) {
        echo '3';
    }
} else {
    $sql = "INSERT INTO usuarios (nombre, documento, correo, usuario, contraseña, tipo_usuario) VALUES (:nombre, :documento, :email, :usuari,  :pass, :tipo_usuario)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':usuari', $usuari);
    $stmt->bindParam(':pass', $pass); // Cambiado de ':contraseña' a ':pass'
    $stmt->bindParam(':tipo_usuario',  $tipo_usuario);
    $stmt->execute();

    echo '1';
    
    }
} catch (PDOException $e) {
    echo "Error al guardar los datos: " . $e->getMessage();
}

// Cerrar la conexión PDO correctamente
$conn = null;
}
?>
