<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    if (isset($_POST['modulo'])) {
        $modulo = trim($_POST['modulo']);
        
        if ($modulo !== '') {
            $_SESSION['modulos'][] = htmlspecialchars($modulo);
        }
    }
    
    
    if (isset($_POST['reset'])) {
        $_SESSION['modulos'] = []; // Vaciamos el array de la sesión
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Modulos</title>
</head>
<body style="font-family: Arial; padding: 50px;">
    
    <h1>Modulos ASIX</h1>
    
    <!-- FORMULARIO -->
   <form method="POST" style="margin-bottom: 20px;">
        <input type="text" name="modulo" placeholder="Ej: IAW" style="padding: 10px; width: 65%; font-size: 16px; border: 1px solid #ccc; border-radius: 4px;" required>
        <input type="submit" value="Añadir" style="padding: 10px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
    </form>
    
    <h3>Módulos insertados</h3>


    <?php>
        <ul>
            <?php
            foreach ($_SESSION['modulos'] as $item) {
                echo "<li>" . $item . "</li>";
            }
            ?>
        </ul>
            
        <form method="POST" style="margin-top: 20px;">
            <input type="hidden" name="reset" value="1">
            <input type="submit" value="Reiniciar lista" style="padding: 8px 12px; background: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">
        </form>
    <?php>
    
</body>
</html>