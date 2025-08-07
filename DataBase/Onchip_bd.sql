-- Criação do banco de dados
DROP database placas_eletronicas;
CREATE DATABASE IF NOT EXISTS placas_eletronicas;
USE placas_eletronicas;

-- Tabela de lotes
CREATE TABLE IF NOT EXISTS lotes (
    id_lote INT AUTO_INCREMENT PRIMARY KEY,
    nome_lote VARCHAR(100) NOT NULL,
    data_recebimento DATE
);

-- Tabela de modelos
CREATE TABLE IF NOT EXISTS modelos (
    id_modelo INT AUTO_INCREMENT PRIMARY KEY,
    nome_modelo VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de placas
CREATE TABLE IF NOT EXISTS placas (
    id_placa INT AUTO_INCREMENT PRIMARY KEY,
    numero_serie VARCHAR(100) NOT NULL UNIQUE,
    id_modelo INT,
    id_lote INT,
    status_teste ENUM('Aprovada', 'Reprovada', 'Curto', 'Não testada') DEFAULT 'Não testada',
    data_teste DATE,
    observacoes TEXT,
    FOREIGN KEY (id_modelo) REFERENCES modelos(id_modelo),
    FOREIGN KEY (id_lote) REFERENCES lotes(id_lote)
);

-- Inserindo modelos
INSERT INTO modelos (nome_modelo, descricao)
VALUES 
    ('Modelo A', 'Placa de controle A'),
    ('Modelo B', 'Placa de potência B');

-- Inserindo lotes
INSERT INTO lotes (nome_lote, data_recebimento)
VALUES 
    ('Lote 001', '2025-07-20'),
    ('Lote 002', '2025-08-01');

-- Inserindo placas
INSERT INTO placas (numero_serie, id_modelo, id_lote, status_teste, data_teste, observacoes)
VALUES 
    ('SN123456', 1, 1, 'Aprovada', '2025-08-05', 'Funcionando corretamente'),
    ('SN123457', 1, 2, 'Curto', '2025-08-05', 'Curto na linha 5V'),
    ('SN123458', 2, 1, 'Reprovada', '2025-08-06', 'Erro na alimentação'),
    ('SN123459', 2, 2, 'Aprovada', '2025-08-07', NULL);
    
-- Pesquisa por número de série, nome do modelo ou nome do lote
SELECT 
    p.numero_serie,
    m.nome_modelo,
    l.nome_lote,
    p.status_teste,
    p.data_teste,
    p.observacoes
FROM placas p
JOIN modelos m ON p.id_modelo = m.id_modelo
JOIN lotes l ON p.id_lote = l.id_lote
WHERE 
    p.numero_serie LIKE '%123458%';