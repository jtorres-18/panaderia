<?php
include('../config/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $metodo_pago = $_POST["metodo_pago"];
    $venta= $_POST["total_venta"];
    $total_venta = str_replace("$", "", $venta);
    $factura = $_POST["factura"];
    $id_cliente= $_POST["id_cliente"];
    
try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO ventas (factura, total_venta, direccion, fecha_hora, metodo_pago, id_cliente ) VALUES (:factura, :total_venta, :direccion, NOW(), :metodo_pago, :id_cliente)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':factura', $factura);
    $stmt->bindParam(':total_venta', $total_venta);
    $stmt->bindParam(':direccion', $direccion); 
    $stmt->bindParam(':metodo_pago',  $metodo_pago);
    $stmt->bindParam(':id_cliente',  $id_cliente);
    $stmt->execute();
    
    $sql = "SELECT id FROM ventas WHERE factura = :factura";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':factura', $factura);

    $stmt->execute();

    if ($stmt->rowCount() == 1) {
       
        $venta = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($venta);
    } 
    

} catch (PDOException $e) {
    echo "Error al guardar los datos: " . $e->getMessage();
}

// Cerrar la conexión PDO correctamente
$conn = null;
}
?>
