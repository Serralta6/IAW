<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador Fácil</title>
</head>
<body style="font-family: Arial; padding: 40px;">

    <h1> Contador</h1>

    <form method="POST">
        <p>¿Hasta qué número contar?: <input type="number" name="numero" min="1" required></p>
        <p>
            <input type="radio" name="direccion" value="subir" checked> Subir (0, 1, 2...) <br>
            <input type="radio" name="direccion" value="bajar"> Bajar (...2, 1, 0)
        </p>
        <input type="submit" value="Contar">
    </form>

    <?php
        $n = $_POST['numero'];
        $direccion = $_POST['direccion'];

        if ($direccion == "subir"){
            $i = 0;
            while ($i <= $n){
                echo $i . " ";
                $i++;
            }
        }

        if ($direccion == "bajar"){
            $i = $n;
            while ($i >= 0){
                echo $i . " ";
                $i--;
            }
        }
    
    ?>

</body>
</html>