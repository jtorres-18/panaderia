<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php
    include("../mostrar/config/config.php");

    $sql = "SELECT * FROM fotoproducts";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID del Producto</th><th>Foto 1</th><th>Foto 2</th><th>Foto 3</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["products_id"] . "</td>";
            echo "<td><img src='img/" . $row["foto1"] . "' width='100' height='100'></td>";
            echo "<td><img src='" . $row["foto2"] . "' width='100' height='100'></td>";
            echo "<td><img src='" . $row["foto3"] . "' width='100' height='100'></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron productos.";
    }


$sql = "SELECT * FROM products";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Productos</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre del Producto</th><th>Precio</th><th>Descripción del Producto</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nameProd"] . "</td><td>" . $row["precio"] . "</td><td>" . $row["description_Prod"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron productos en la base de datos.";
}


    $con->close();
    ?>
</body>
</html>
