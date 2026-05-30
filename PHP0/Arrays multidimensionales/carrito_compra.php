<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [
        ["nombre" => "Ratón",   "precio" => 10.0, "cantidad" => 2],
        ["nombre" => "Teclado", "precio" => 20.0, "cantidad" => 1],
        ["nombre" => "Monitor", "precio" => 150.0,"cantidad" => 1],
    ];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (isset($_POST['nombre'], $_POST['precio'], $_POST['cantidad'])) {
        $nombre = trim($_POST['nombre']);
        $precio = floatval($_POST['precio']);
        $cantidad = intval($_POST['cantidad']);
        
        if ($nombre !== '' && $precio > 0 && $cantidad > 0) {
            $nuevo_producto = [
                "nombre" => htmlspecialchars($nombre),
                "precio" => $precio,
                "cantidad" => $cantidad
            ];
            $_SESSION['carrito'][] = $nuevo_producto;
        }
    }
    
    if (isset($_POST['vaciar'])) {
        $_SESSION['carrito'] = []; 
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej3 - Carrito de la Compra Pro</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 40px; background-color: #fafafa;">

    <h1>🛒 Carrito de la Compra</h1>

    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; background: white; min-width: 600px;">
        <thead style="background-color: #FF9800; color: white;">
            <tr>
                <th>Producto</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $item):
                $subtotal = $item["precio"] * $item["cantidad"];
                $total += $subtotal;
            ?>
                <tr style="text-align: center;">
                    <td style="text-align: left; padding-left: 15px;"><?php echo $item["nombre"]; ?></td>
                    <td><?php echo number_format($item["precio"], 2); ?> €</td>
                    <td><?php echo $item["cantidad"]; ?></td>
                    <td style="font-weight: bold;"><?php echo number_format($subtotal, 2); ?> €</td>
                </tr>
            <?php endforeach; ?>
            
            <?php if (empty($_SESSION['carrito'])): ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: #999; font-style: italic;">El carrito está totalmente vacío.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Total a pagar: <span style="color: #E65100;"><?php echo number_format($total, 2); ?> €</span></h2>

    <hr style="border: 0; border-top: 1px solid #ccc; margin: 30px 0;">

    <div style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ddd; max-width: 400px;">