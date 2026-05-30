<!DOCTYPE html>
<html>
<head>
    <title>¡Hola Mundo PHP!</title>
</head>
<body style="font-family: Arial; padding: 50px;">
    
    <h1> ¡Hola !</h1>
    
    <!-- FORMULARIO SIMPLE -->
    <form method="POST">
        <p>Tu nombre: 
            <input type="text" name="nombre" style="padding: 10px; font-size: 16px;">
            <input type="submit" value="¡Enviar!" style="padding: 10px 20px; background: #4CAF50; color: white; border: none;">
        </p>
    </form>
    
    <?php
        $nombre = $_POST['nombre'];
        echo "<h2>Tu nombre es: " . $nombre . "</h2>";
    ?>
    
</body>
</html>
