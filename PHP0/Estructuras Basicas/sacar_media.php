<!DOCTYPE html>
<html>
<head>
    <title>Sacar la media del alumno</title>
</head>
<body style="font-family: Arial; padding: 50px;">
    
    <h1>MEDIA</h1>
    
    <form method="POST">
        <p>
            Nombre:<input type="text" name="nombre" style="padding: 10px; font-size: 16px;"> <p>
            Nota 1:<input type="number" name="nota1" style="padding: 10px;"> <p>
            Nota 2:<input type="number" name="nota2" style="padding: 10px;"> <p>
            Nota 3:<input type="number" name="nota3" style="padding: 10px;"> <p>
            <input type="submit" value="Enviar" style="padding: 10px 20px; background: #FF9800; color: white; border: none; font-size: 20px;">
        </p>
    </form>
    
    <?php
        $not1 = $_POST['nota1'];
        $not2 = $_POST['nota2'];
        $not3 = $_POST['nota3'];
        $media = ($not1 + $not2 + $not3) / 3;
        $nombre = $_POST['nombre'];

        if ($media < 5) {
            echo "<h3>Lo siento, " . $nombre . ", estás suspendido.</h3>";
        } 
        elseif ($media >= 5 && $media < 6) {
            echo "<h3>Bien, " . $nombre . ", estás aprobado.</h3>";
        } 
        elseif ($media >= 6 && $media < 7) {
            echo "<h3>Perfecto " . $nombre . ", tienes un bien.</h3>";
        } 
        elseif ($media >= 7 && $media < 9) {
            echo "<h3>Fenomenal " . $nombre . ", tienes un notable.</h3>";
        } 
        elseif ($media >= 9 && $media <= 10) { 
            echo "<h3>Enhorabuena " . $nombre . ", sobresaliente.</h3>";
        }

    ?>
    
</body>
</html>