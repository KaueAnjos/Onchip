-- Reset do banco
DROP DATABASE IF EXISTS placas_eletronicas;
CREATE DATABASE placas_eletronicas;
USE placas_eletronicas;

-- Tabela de clientes
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    cnpj VARCHAR(20),
    telefone VARCHAR(20),
    email VARCHAR(100),
    endereco TEXT
);

-- Tabela de funcionários
CREATE TABLE funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcionario VARCHAR(100) NOT NULL,
    cargo VARCHAR(50),
    email VARCHAR(100),
    telefone VARCHAR(20)
);

-- Tabela de modelos
CREATE TABLE modelos (
    id_modelo INT AUTO_INCREMENT PRIMARY KEY,
    nome_modelo VARCHAR(100) NOT NULL,
    descricao TEXT
);

-- Tabela de lotes de produção
CREATE TABLE lotes (
    id_lote INT AUTO_INCREMENT PRIMARY KEY,
    nome_lote VARCHAR(100) NOT NULL,
    data_recebimento DATE,
    id_cliente INT,
    id_modelo INT,
    quantidade INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_modelo) REFERENCES modelos(id_modelo)
);

-- Tabela de placas
CREATE TABLE placas (
    id_placa INT AUTO_INCREMENT PRIMARY KEY,
    numero_serie VARCHAR(100) NOT NULL UNIQUE,
    id_modelo INT,
    id_lote INT,
    FOREIGN KEY (id_modelo) REFERENCES modelos(id_modelo),
    FOREIGN KEY (id_lote) REFERENCES lotes(id_lote)
);

-- Tabela de montagem
CREATE TABLE montagem (
    id_montagem INT AUTO_INCREMENT PRIMARY KEY,
    id_placa INT,
    data_montagem DATE,
    montador VARCHAR(100),
    observacoes TEXT,
    FOREIGN KEY (id_placa) REFERENCES placas(id_placa)
);

-- Tabela de testes
CREATE TABLE testes (
    id_teste INT AUTO_INCREMENT PRIMARY KEY,
    id_placa INT,
    data_teste DATE,
    status_teste ENUM('Aprovada', 'Reprovada', 'Curto', 'Não testada') DEFAULT 'Não testada',
    observacoes TEXT,
    responsavel_teste VARCHAR(100),
    FOREIGN KEY (id_placa) REFERENCES placas(id_placa)
);

-- Tabela de pedidos/vendas
CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    data_pedido DATE,
    numero_nf VARCHAR(50),
    data_entrega DATE,
    observacoes TEXT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

-- Tabela intermediária: itens do pedido (relaciona placas vendidas)
CREATE TABLE itens_pedido (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_placa INT,
    preco_unitario DECIMAL(10,2),
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
    FOREIGN KEY (id_placa) REFERENCES placas(id_placa)
);

-- Clientes
INSERT INTO clientes (nome_cliente, cnpj, telefone, email, endereco)
VALUES 
('Zurich Tecnologia', '12.345.678/0001-90', '11988887777', 'contato@zurich.com', 'Rua A, SP'),
('Alfa Sistemas', '98.765.432/0001-11', '21999998888', 'comercial@alfa.com', 'Av. B, RJ');

-- Funcionários
INSERT INTO funcionarios (nome_funcionario, cargo, email, telefone)
VALUES 
('Lucas Ramos', 'Técnico de Teste', 'lucas@empresa.com', '11980001111'),
('Patrícia Souza', 'Montadora', 'patricia@empresa.com', '11981112222');

-- Modelos
INSERT INTO modelos (nome_modelo, descricao)
VALUES 
('OTT-420', 'Transmissor de Temperatura'),
('OTT42MD2', 'Transmissor de Temperatura');

-- Lotes
INSERT INTO lotes (nome_lote, data_recebimento, id_cliente, id_modelo, quantidade)
VALUES 
('Lote A1', '2025-08-01', 1, 1, 100),
('Lote B1', '2025-08-02', 2, 2, 200);

-- Placas
INSERT INTO placas (numero_serie, id_modelo, id_lote)
VALUES 
('SN1001', 1, 1),
('SN1002', 1, 1),
('SN2001', 2, 2),
('SN2002', 2, 2);

-- Montagem
INSERT INTO montagem (id_placa, data_montagem, montador, observacoes)
VALUES 
(1, '2025-08-03', 'Patrícia Souza', 'Montagem OK'),
(2, '2025-08-03', 'Patrícia Souza', 'Soldagem precisa');

-- Testes
INSERT INTO testes (id_placa, data_teste, status_teste, observacoes, responsavel_teste)
VALUES 
(1, '2025-08-04', 'Aprovada', 'Funcionando 100%', 'Lucas Ramos'),
(2, '2025-08-04', 'Curto', 'Falha no capacitor C12', 'Lucas Ramos');

-- Pedidos
INSERT INTO pedidos (id_cliente, data_pedido, numero_nf, data_entrega, observacoes)
VALUES 
(1, '2025-08-05', 'NF00123', '2025-08-10', 'Pedido normal'),
(2, '2025-08-06', 'NF00124', '2025-08-11', 'Pedido urgente');

-- Itens do pedido
INSERT INTO itens_pedido (id_pedido, id_placa, preco_unitario)
VALUES 
(1, 1, 150.00),
(2, 3, 200.00);

-- Parâmetro de pesquisa (você pode substituir a string entre %%)
SET @busca := '%SN1002%';

SELECT 
    p.numero_serie,
    m.nome_modelo,
    l.nome_lote,
    t.status_teste,
    t.data_teste,
    c.nome_cliente
FROM placas p
JOIN modelos m ON p.id_modelo = m.id_modelo
JOIN lotes l ON p.id_lote = l.id_lote
LEFT JOIN testes t ON p.id_placa = t.id_placa
JOIN clientes c ON l.id_cliente = c.id_cliente
WHERE 
    p.numero_serie LIKE @busca
    OR m.nome_modelo LIKE @busca
    OR l.nome_lote LIKE @busca
    OR c.nome_cliente LIKE @busca;