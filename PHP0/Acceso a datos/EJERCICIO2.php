<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=asix;charset=utf8mb4",
    "asix_user",
    "1234"
);

// INSERT + PRG
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');

    if ($nombre !== '') {
        $stmt = $pdo->prepare("INSERT INTO modulos (nombre) VALUES (?)");
        $stmt->execute([$nombre]);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$modulos = $pdo->query("SELECT * FROM modulos ORDER BY id ASC")
               ->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<body style="font-family: Arial; padding: 30px;">

<h2>Insertar módulo</h2>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre módulo">
    <button type="submit">Guardar</button>
</form>

<hr>

<h3>Listado</h3>

<ul>
<?php foreach ($modulos as $m): ?>
    <li><?= htmlspecialchars((string)$m['id']) ?> - <?= htmlspecialchars($m['nombre']) ?></li>
<?php endforeach; ?>
</ul>

</body>
</html>