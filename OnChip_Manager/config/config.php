<?php
require_once __DIR__ . '/connection.php';

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