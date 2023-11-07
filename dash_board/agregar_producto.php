<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="procesar_producto.php" method="post" enctype="multipart/form-data">
        <label for="products_id">codigo del producto</label>
        <input type="text" name="codigo" required><br>
        
        <label>Nombre del Producto:</label>
        <input type="text" name="nameProd"><br>

        <label>Precio:</label>
        <input type="number" name="precio"><br>

        <label>Descripción del Producto:</label>
        <textarea name="description_Prod"></textarea><br>

        <label for="foto1">Foto 1:</label>
        <input type="file" name="foto1" accept="image/*" required><br>
        
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
