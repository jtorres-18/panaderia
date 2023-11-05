<?php
include('../mostrar/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_pass = $_POST['new_passs'];
    $id = $_POST['id'];

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE usuarios SET contraseña = :new_pass WHERE id = :id"; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':new_pass', $new_pass);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            // Comprueba si se realizó la actualización correctamente
            if ($stmt->rowCount() > 0) {
                echo "1";
            } else {
                echo "2";
            }
        
    } catch (PDOException $e) {
        echo "Error al cambiar la contraseña: " . $e->getMessage();
    }

    $conn = null;
}
?>
