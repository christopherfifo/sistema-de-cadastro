CREATE DATABASE IF NOT EXISTS cadastro_usuario DEFAULT CHARACTER SET utf8;

USE cadastro_usuario;

CREATE TABLE IF NOT EXISTS Users(
    id INT AUTO_INCREMENT primary key,
    name VARCHAR(255) NOT NULL,
    cpf VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    telephone VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL DEFAULT 'user',
    estatus VARCHAR(255) NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 1. Inserir usuários
INSERT INTO Users (name, cpf, email, telephone, password) VALUES
('Lucas', '12345678900', 'email@gmail.com', '11987654321', '123456'),
('Pedro', '12345678901', 'pedro@gmail.com', '11987654322', '123456'),
('João', '12345678902', 'joao@gmail.com', '11987654323', '123456');

drop DATABASE IF EXISTS cadastro_usuario;