<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "placas_eletronicas");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search logic
$search = "";
$result = [];

if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);

    $sql = "SELECT 
                p.id_placa,
                p.numero_serie,
                m.nome_modelo,
                l.nome_lote,
                t.status_teste,
                t.data_teste
            FROM placas p
            JOIN modelos m ON p.id_modelo = m.id_modelo
            JOIN lotes l ON p.id_lote = l.id_lote
            LEFT JOIN testes t ON p.id_placa = t.id_placa
            WHERE 
                p.numero_serie LIKE '%$search%' OR
                m.nome_modelo LIKE '%$search%' OR
                l.nome_lote LIKE '%$search%'
            ORDER BY t.data_teste DESC";
} else {
    $sql = "SELECT 
                p.id_placa,
                p.numero_serie,
                m.nome_modelo,
                l.nome_lote,
                t.status_teste,
                t.data_teste
            FROM placas p
            JOIN modelos m ON p.id_modelo = m.id_modelo
            JOIN lotes l ON p.id_lote = l.id_lote
            LEFT JOIN testes t ON p.id_placa = t.id_placa
            ORDER BY t.data_teste DESC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OnChip Manager</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f2f2f2; }
        h1 { color: #333; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        input[type="text"] { padding: 8px; width: 300px; }
        input[type="submit"] { padding: 8px 16px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

<h1>OnChip Manager - PCB Management</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Pesquise por Nº Serie, Lote e Modelo" value="<?= htmlspecialchars($search) ?>">
    <input type="submit" value="Search">
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

</body>
</html>