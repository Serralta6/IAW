<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=asix;charset=utf8mb4",
    "asix_user",
    "1234"
);

// DELETE + PRG
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    if ($id > 0) {
        $stmt = $pdo->prepare("DELETE FROM modulos WHERE id = ?");
        $stmt->execute([$id]);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

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

<h2>Gestión de módulos</h2>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre módulo">
    <button type="submit">Guardar</button>
</form>

<hr>

<h3>Listado</h3>

<ul>
<?php foreach ($modulos as $m): ?>
    <li>
        <?= htmlspecialchars((string)$m['id']) ?> -
        <?= htmlspecialchars($m['nombre']) ?>
        | <a href="?delete=<?= (int)$m['id'] ?>" 
             onclick="return confirm('¿Eliminar este módulo?')">
             Eliminar
          </a>
    </li>
<?php endforeach; ?>
</ul>

</body>
</html>