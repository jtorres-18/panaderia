<?php
include("../mostrar/config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo  = $_POST["codigo"];
    $nameProd = $_POST["nameProd"];
    $precio = $_POST["precio"];
    $description_Prod = $_POST["description_Prod"];

    // Verificar si el código ya existe
    $checkQuery = "SELECT id FROM products WHERE codigo = '$codigo'";
    $checkResult = $con->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "El código ya existe en la base de datos. Por favor, elija otro código.";
    } else {
        // Si el código no se encuentra, proceder con la inserción
        $sql = "INSERT INTO products (codigo, nameProd, precio, description_Prod) VALUES ('$codigo', '$nameProd', $precio, '$description_Prod')";

        if ($con->query($sql) === TRUE) {
            $lastInsertedProductId = $con->insert_id;
            echo "Producto agregado con éxito.";
        } else {
            echo "Error al agregar el producto: " . $con->error;
        }

        $products_id = $lastInsertedProductId;
        $foto1 = $_FILES["foto1"]["name"];
        

        $uploadDir = "../dash_board/img/";

        move_uploaded_file($_FILES["foto1"]["tmp_name"], $uploadDir . $foto1);
        

        $sql = "INSERT INTO fotoproducts (products_id, foto1) VALUES ('$products_id', '$foto1')";

        if ($con->query($sql) === TRUE) {
            header("Location: listar_productos.php");
            exit();
        } else {
            echo "Error al agregar el producto: " . $con->error;
        }
    }
}

$con->close();
?>
