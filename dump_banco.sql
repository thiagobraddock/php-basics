-- Banco de dados para o sistema de estabelecimentos de Espírito Santo do Pinhal
-- Execute este script no MySQL para criar a estrutura

CREATE DATABASE IF NOT EXISTS estabelecimentos_pinhal;
USE estabelecimentos_pinhal;

CREATE TABLE estabelecimentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    telefone VARCHAR(20),
    categoria VARCHAR(50) NOT NULL,
    especialidade VARCHAR(150),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dados de exemplo para testar
INSERT INTO estabelecimentos (nome, endereco, telefone, categoria, especialidade) VALUES
('Café do Largo', 'Praça da Bandeira, 45 - Centro, Espírito Santo do Pinhal', '(19) 3651-1122', 'Cafeteria', 'Cafés especiais e quitutes caseiros'),
('Restaurante Dona Elisa', 'Rua Treze de Maio, 210 - Centro, Espírito Santo do Pinhal', '(19) 3651-3344', 'Restaurante', 'Comida caseira com toque regional'),
('Padaria Santo Pão', 'Av. Oliveira Motta, 980 - Jardim Universitário, Espírito Santo do Pinhal', '(19) 99988-7766', 'Padaria', 'Pães artesanais e doces finos'),
('Pizzaria Nostra Massa', 'Rua Dr. Cândido de Oliveira, 150 - Centro, Espírito Santo do Pinhal', '(19) 3651-7788', 'Pizzaria', 'Pizzas no forno a lenha e calzones'),
('Doceria Doce Pinhal', 'Rua João Pessoa, 66 - Jardim Ouro Verde, Espírito Santo do Pinhal', '(19) 98877-6655', 'Doceria', 'Doces artesanais e bolos comemorativos');