CREATE DATABASE xmas_e_shop;
USE xmas_e_shop;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    prix VARCHAR(50),
    image VARCHAR(255)
);

INSERT INTO products (name, prix,description, image) VALUES
('Gisou-Rose Bonbon', '20000 Ar','Jolie Cadeau de Noël', '1.jpg'),
('Gisou-Marron Chocolat', '19000 Ar','Jolie Cadeau de Noël', '2.jpg'),
('Gisou-Brownies', '17000 Ar', 'Jolie Cadeau de Noël','3.jpg'),
('EADEM Lip Balm-Pain au Chocolat', '12590 Ar', 'Jolie Cadeau de Noël','1.jpg'),
('EADEM Lip Balm-Croissant au Beure', '12500 Ar', 'Jolie Cadeau de Noël','2.jpg');