-- Banco de dados para o sistema de cafeterias
-- Execute este script no MySQL para criar a estrutura

CREATE DATABASE IF NOT EXISTS cafeterias_pocos;
USE cafeterias_pocos;

CREATE TABLE cafeterias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    telefone VARCHAR(20),
    especialidade VARCHAR(150),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de usuários para autenticação
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome_completo VARCHAR(100) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dados de exemplo para testar
INSERT INTO cafeterias (nome, endereco, telefone, especialidade) VALUES
('Café do Centro', 'Rua Rio de Janeiro, 123 - Centro', '(35) 3721-1234', 'Café expresso e pão de açúcar'),
('Doceria Mineira', 'Av. Francisco Salles, 456 - Vila Rica', '(35) 3722-5678', 'Doces tradicionais e café colonial'),
('Coffee House', 'Rua Assis Figueiredo, 789 - Centro', '(35) 3723-9012', 'Cafés especiais e tortas');

-- Usuário de exemplo para testes (senha: admin123)
INSERT INTO usuarios (username, senha, nome_completo) VALUES
('admin', '$2y$10$IPLa3sijmHYGJLzDuDmkyu3TQ6sOC028nay4ZpdnlbVnSBnO5zLD2', 'Administrador');