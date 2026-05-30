<?php
$alumnos = [
    ["id" => 1, "nombre" => "Ana",   "ciclo" => "ASIR", "curso" => 1, "nota" => 7],
    ["id" => 2, "nombre" => "Luis",  "ciclo" => "ASIR", "curso" => 2, "nota" => 8.5],
    ["id" => 3, "nombre" => "Marta", "ciclo" => "DAW",  "curso" => 1, "nota" => 6],
    ["id" => 4, "nombre" => "Juan",  "ciclo" => "DAW",  "curso" => 2, "nota" => 9],
    ["id" => 5, "nombre" => "Sara",  "ciclo" => "ASIR", "curso" => 1, "nota" => 5.5],
];

$ciclo_elegido = "Todos";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ciclo'])) {
    $ciclo_elegido = $_POST['ciclo'];
}

$contador_mostrados = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ej2 - Filtrar Alumnos</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 40px; background-color: #fafafa;">

    <h1>🔍 Filtrar Alumnos por Ciclo</h1>

    <form method="POST" style="margin-bottom: 25px; background: #eee; padding: 15px; border-radius: 5px; display: inline-block;">
        <label for="ciclo"><strong>Selecciona un ciclo:</strong></label>
        <select name="ciclo" id="ciclo" style="padding: 5px; font-size: 16px; margin-left: 10px;">
            <option value="Todos" <?php if ($ciclo_elegido == "Todos") echo "selected"; ?>>Todos</option>
            <option value="ASIR" <?php if ($ciclo_elegido == "ASIR") echo "selected"; ?>>ASIR</option>
            <option value="DAW"  <?php if ($ciclo_elegido == "DAW")  echo "selected"; ?>>DAW</option>
        </select>
        <input type="submit" value="Filtrar" style="padding: 5px 15px; margin-left: 10px; cursor: pointer;">
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; background: white; min-width: 500px;">
        <thead style="background-color: #4CAF50; color: white;">
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
                <?php 
                if ($ciclo_elegido === "Todos" || $alumno["ciclo"] === $ciclo_elegido): 
                    $contador_mostrados++; // Sumamos uno al total de mostrados
                ?>
                    <tr style="text-align: center;">
                        <td><?php echo $alumno["id"]; ?></td>
                        <td style="text-align: left; padding-left: 15px;"><?php echo $alumno["nombre"]; ?></td>
                        <td><?php echo $alumno["ciclo"]; ?></td>
                        <td><?php echo $alumno["curso"]; ?>º</td>
                        <td><?php echo $alumno["nota"]; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px; padding: 10px 15px; background: #eef7ee; border-left: 5px solid #4