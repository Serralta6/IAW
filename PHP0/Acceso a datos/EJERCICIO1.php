<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=asix;charset=utf8mb4",
    "asix_user",
    "1234"
);

$modulos = $pdo->query("SELECT * FROM modulos ORDER BY id ASC")
               ->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<body style="font-family: Arial; padding: 30px;">
<h2>Listado de módulos</h2>

<?php if (empty($modulos)): ?>
    <p>No hay módulos registrados.</p>
<?php else: ?>
    <ul>
        <?php foreach ($modulos as $m): ?>
            <li>
                <?= htmlspecialchars((string)$m['id']) ?> -
                <?= htmlspecialchars($m['nombre']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>