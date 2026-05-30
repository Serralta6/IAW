<?php
// 1. DEFINICIÓN DE DATOS (Siempre arriba del todo para tener el código ordenado)
$alumnos = [
    ["id" => 1, "nombre" => "Ana",   "ciclo" => "ASIR", "curso" => 1, "nota" => 7],
    ["id" => 2, "nombre" => "Luis",  "ciclo" => "ASIR", "curso" => 2, "nota" => 8.5],
    ["id" => 3, "nombre" => "Marta", "ciclo" => "DAW",  "curso" => 1, "nota" => 6],
    ["id" => 4, "nombre" => "Juan",  "ciclo" => "DAW",  "curso" => 2, "nota" => 9],
    ["id" => 5, "nombre" => "Sara",  "ciclo" => "ASIR", "curso" => 1, "nota" => 5.5],
];

// Preparamos las variables que usaremos abajo
$sumaNotas = 0;
$totalAlumnos = count($alumnos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej1 - Alumnos</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 40px; background-color: #fafafa;">

    <h1>📋 Listado de Alumnos</h1>

    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; background: white; min-width: 500px;">
        <thead style="background-color: #2196F3; color: white;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciclo</th>
                <th>Curso</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
                <?php $sumaNotas += $alumno["nota"]; // Vamos acumulando la nota en cada vuelta ?>
                <tr style="text-align: center;">
                    <td><?php echo $alumno["id"]; ?></td>
                    <td style="text-align: left; padding-left: 15px;"><?php echo $alumno["nombre"]; ?></td>
                    <td><?php echo $alumno["ciclo"]; ?></td>
                    <td><?php echo $alumno["curso"]; ?>º</td>
                    <td style="font-weight: bold;"><?php echo $alumno["nota"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px; padding: 15px; background: #e7f3fe; border-left: 5px solid #2196F3; max-width: 500px; box-sizing: border-box;">
        <?php
        // Calculamos la media (evitando dividir por cero si el array estuviera vacío)
        $media = ($totalAlumnos > 0) ? ($sumaNotas / $totalAlumnos) : 0;
        
        echo "<p style='margin: 5px 0;'><strong>Total alumnos:</strong> $totalAlumnos</p>";
        echo "<p style='margin: 5px 0;'><strong>Nota media de la clase:</strong> " . number_format($media, 2) . "</p>";
        ?>
    </div>

</body>
</html>