<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Limpiar LocalStorage</title>
</head>
<body>
    <script>
        // Limpiar el localStorage
        localStorage.clear();
        
        // Redirigir al usuario a la página index.html
        window.location.href = '../index.html';
    </script>
</body>
</html>

