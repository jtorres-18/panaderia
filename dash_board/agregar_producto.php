<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="procesar_producto.php" method="post" enctype="multipart/form-data">
        <label for="products_id">ID del producto:</label>
        <input type="text" name="products_id" required><br>
        
        <label>Nombre del Producto:</label>
        <input type="text" name="nameProd"><br>

        <label>Precio:</label>
        <input type="number" name="precio"><br>

        <label>Descripción del Producto:</label>
        <textarea name="description_Prod"></textarea><br>

        <label for="foto1">Foto 1:</label>
        <input type="file" name="foto1" accept="image/*" required><br>
        
        <label for="foto2">Foto 2:</label>
        <input type="file" name="foto2" accept="image/*" ><br>

        <label for="foto3">Foto 3:</label>
        <input type="file" name="foto3" accept="image/*" ><br>
        
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
