CREATE DATABASE imobiliaria;
USE imobiliaria;

CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    endereco VARCHAR(150),
    tipo ENUM('Casa', 'Apartamento', 'Terreno') NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);