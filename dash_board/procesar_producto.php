<?php
include("../mostrar/config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nameProd = $_POST["nameProd"];
    $precio = $_POST["precio"];
    $description_Prod = $_POST["description_Prod"];
    
    $sql = "INSERT INTO products (nameProd, precio, description_Prod) VALUES ('$nameProd', $precio, '$description_Prod')";
    
    if ($con->query($sql) === TRUE) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error al agregar el producto: " . $con->error;
    }

    $products_id = $_POST["products_id"];
    $foto1 = $_FILES["foto1"]["name"];
    $foto2 = $_FILES["foto2"]["name"];
    $foto3 = $_FILES["foto3"]["name"];

    $uploadDir = "../dash_board/img/";

    move_uploaded_file($_FILES["foto1"]["tmp_name"], $uploadDir . $foto1);
    move_uploaded_file($_FILES["foto2"]["tmp_name"], $uploadDir . $foto2);
    move_uploaded_file($_FILES["foto3"]["tmp_name"], $uploadDir . $foto3);

    $sql = "INSERT INTO fotoproducts (products_id, foto1, foto2, foto3) VALUES ('$products_id', '$foto1', '$foto2', '$foto3')";

    if ($con->query($sql) === TRUE) {
        header("Location: listar_productos.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $con->error;
    }

    





}

$con->close();
?>
