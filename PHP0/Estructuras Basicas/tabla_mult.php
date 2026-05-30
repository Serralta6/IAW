<!DOCTYPE html>
<html>
<head>
    <title>Multiplicar</title>
</head>
<body style="font-family: Arial; padding: 50px;">
    
    <h1>Multiplicar</h1>
    
    <!-- FORMULARIO -->
    <form method="POST">
        <p>
            Número a Multiplicar: <input type="number" name="numero" style="padding: 10px;">
            <input type="submit" value="=" style="padding: 10px 20px; background: #FF9800; color: white; border: none; font-size: 20px;">
        </p>
    </form>
    
    <?php
        $num = $_POST['numero'];
        $i = 0;

        while ($i <= 10){
            $multiplicacion = $i * $num;
            echo $multiplicacion . " ";
            $i++;
        }
    ?>
    
</body>
</html>