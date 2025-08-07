<?php
require_once __DIR__ . '/config/connection.php';

$clientes = $conn->query("SELECT * FROM clientes");
$modelos = $conn->query("SELECT * FROM modelos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_modelo = $_POST['id_modelo'];
    $quantidade = intval($_POST['quantidade']);

    // Criar um novo lote
    $nome_lote = 'Lote_' . date('Ymd_His');
    $conn->query("INSERT INTO lotes (nome_lote) VALUES ('$nome_lote')");
    $id_lote = $conn->insert_id;

    // Criar pedido
    $conn->query("INSERT INTO pedidos (id_cliente, id_modelo, id_lote, quantidade) 
                  VALUES ($id_cliente, $id_modelo, $id_lote, $quantidade)");

    // Gerar placas com número de série
    $lastSerialResult = $conn->query("SELECT numero_serie FROM placas 
                                  WHERE numero_serie LIKE 'SN%' 
                                  ORDER BY id_placa DESC LIMIT 1");

    $lastSerialNumber = 1000;

    if ($lastSerialResult && $row = $lastSerialResult->fetch_assoc()) {
        $lastSN = intval(substr($row['numero_serie'], 2));
        $lastSerialNumber = $lastSN + 1;
    }

    for ($i = 0; $i < $quantidade; $i++) {
        $numero_serie = 'SN' . ($lastSerialNumber + $i);
        $conn->query("INSERT INTO placas (numero_serie, id_modelo, id_lote) 
                  VALUES ('$numero_serie', $id_modelo, $id_lote)");
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Adicionar Pedido</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include 'include/navbar.php'; ?>

    <h1>Adicionar Novo Pedido</h1>

    <form method="POST">
        <label for="id_cliente">Cliente:</label>
        <select name="id_cliente" required>
            <option value="">Selecione um cliente</option>
            <?php while ($cliente = $clientes->fetch_assoc()): ?>
                <option value="<?= $cliente['id_cliente'] ?>"><?= $cliente['nome_cliente'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="id_modelo">Modelo da Placa:</label>
        <select name="id_modelo" required>
            <option value="">Selecione um modelo</option>
            <?php while ($modelo = $modelos->fetch_assoc()): ?>
                <option value="<?= $modelo['id_modelo'] ?>"><?= $modelo['nome_modelo'] ?></option>
            <?php endwhile; ?>
        </select>

        <label for="quantidade">Quantidade de placas:</label>
        <input type="number" name="quantidade" min="1" required>

        <button type="submit">Criar Pedido</button>
    </form>

    <?php include 'include/footer.php'; ?>

</body>

</html>