<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body style="font-family: Arial; padding: 50px;">
    
    <h1>Contador de Caracteres</h1>
    
    <!-- FORMULARIO -->
    <form method="POST">
        <p>Escribe tu texto:</p>
        <textarea name="mensaje" rows="5" cols="50" style="padding: 10px; font-size: 16px;"></textarea>
        <br><br>
        <input type="submit" value="Contar caracteres">
    </form>
    
    <?php
        $texto = $_POST['mensaje'];

        $cont = 0;

        while (isset($texto[$cont])) {
            $cont++;
        }

        if ($cont >= 100){
            $color = "red";
        } else{
            $color = "green";
        }

       echo "<h3>Resultado del análisis:</h3>";
        echo "<p style='font-size: 20px;'>";
        echo "El texto tiene: <span style='color: " . $color . "; font-weight: bold;'>" . $cont . "</span> caracteres.";
        echo "</p>";
    ?>
    
</body>
</html>