<?php
require_once __DIR__ . '/config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OnChip Manager</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'include/navbar.php'; ?>

<h1>Dashboard</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Search by Serial Number, Lot or Model" value="<?= htmlspecialchars($search) ?>">
    <input type="submit" value="Search">
    <a href="add_order.php" style="display: inline-block; margin-bottom: 20px; text-decoration: underline;">Adicionar novo pedido</a>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Serial Number</th>
            <th>Model</th>
            <th>Lot</th>
            <th>Test Status</th>
            <th>Test Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_placa'] ?></td>
                    <td><?= $row['numero_serie'] ?></td>
                    <td><?= $row['nome_modelo'] ?></td>
                    <td><?= $row['nome_lote'] ?></td>
                    <td><?= $row['status_teste'] ?? 'N/A' ?></td>
                    <td><?= $row['data_teste'] ?? 'N/A' ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">No records found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="add_order.php" style="display: inline-block; margin-bottom: 20px; text-decoration: underline;">Adicionar novo pedido</a>

<?php include 'include/footer.php'; ?>

</body>
</html>