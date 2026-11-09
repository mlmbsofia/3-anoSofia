
CREATE DATABASE IF NOT EXISTS syslogin
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE syslogin;

CREATE TABLE IF NOT EXISTS usuario (
                                       id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                       nome VARCHAR(150) NOT NULL,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(254) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS recuperacao_senha (
                                                 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                                 usuario_id INT UNSIGNED NOT NULL,
                                                 token_hash CHAR(64) NOT NULL UNIQUE,
    expira_em DATETIME NOT NULL,
    utilizado_em DATETIME NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id)
    REFERENCES usuario(id)
    ON DELETE CASCADE
    );
