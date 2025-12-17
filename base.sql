CREATE DATABASE IF NOT EXISTS taxi_moto;
USE taxi_moto;

CREATE TABLE taxi_carburant (
    id_carburant INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    prix DECIMAL(10,2) NOT NULL
);

CREATE TABLE taxi_conducteur (
    id_conducteur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL
);

CREATE TABLE taxi_moto (
    id_moto INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(100) NOT NULL,
    immatriculation VARCHAR(20) UNIQUE,
    id_carburant INT NOT NULL,
    FOREIGN KEY (id_carburant) REFERENCES taxi_carburant(id_carburant)
);

CREATE TABLE taxi_consommation_moto (
    id_moto INT PRIMARY KEY,
    consommation_par_100km DECIMAL(5,2) NOT NULL COMMENT 'Consommation actuelle en L/100km',
    FOREIGN KEY (id_moto) REFERENCES taxi_moto(id_moto)
);

CREATE TABLE taxi_course (
    id_course INT PRIMARY KEY AUTO_INCREMENT,
    id_moto INT NOT NULL,
    id_conducteur INT NOT NULL,
    date_course DATE NOT NULL,
    h_depart TIME NOT NULL,
    lieu_depart VARCHAR(200) NOT NULL,
    h_arrivee TIME NOT NULL,
    lieu_destination VARCHAR(200) NOT NULL,
    km_effectue DECIMAL(8,2) NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    etat ENUM('insere', 'termine', 'valide') DEFAULT 'insere',
    FOREIGN KEY (id_moto) REFERENCES taxi_moto(id_moto),
    FOREIGN KEY (id_conducteur) REFERENCES taxi_conducteur(id_conducteur)
);

CREATE TABLE taxi_salaire_conducteur (
    id_salaire INT PRIMARY KEY AUTO_INCREMENT,
    id_conducteur INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    pourcentage DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (id_conducteur) REFERENCES taxi_conducteur(id_conducteur)
);

CREATE TABLE taxi_entretien_moto (
    id_entretien INT PRIMARY KEY AUTO_INCREMENT,
    id_moto INT NOT NULL,
    date_debut DATE NOT NULL,
    date_fin DATE,
    pourcentage DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (id_moto) REFERENCES taxi_moto(id_moto)
);

CREATE TABLE taxi_course_valide(
    id_course_valide INT PRIMARY KEY AUTO_INCREMENT,
    id_moto INT NOT NULL,
    id_conducteur INT NOT NULL,
    date_course DATE NOT NULL,
    h_depart TIME NOT NULL,
    lieu_depart VARCHAR(200) NOT NULL,
    h_arrivee TIME NOT NULL,
    lieu_destination VARCHAR(200) NOT NULL,
    km_effectue DECIMAL(8,2) NOT NULL,
    montant DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_moto) REFERENCES taxi_moto(id_moto),
    FOREIGN KEY (id_conducteur) REFERENCES taxi_conducteur(id_conducteur)
);

-- DONNÉES
-- taxi_Carburant
INSERT INTO taxi_carburant (type, prix) VALUES
('Essence 95', 5000.00),
('Essence 98', 5200.00),
('Diesel', 4500.00);

-- taxi_Conducteur
INSERT INTO taxi_conducteur (nom, prenom) VALUES
('RAKOTO', 'Jean'),
('RABE', 'Paul'),
('RAMANANTSOA', 'Claire'),
('RASOAMANANA', 'David');

-- taxi_Moto (les IDs AUTO_INCREMENT seront : 1, 2, 3, 4, 5, 6)
INSERT INTO taxi_moto (marque, immatriculation, id_carburant) VALUES
('Honda CBR 150', '1234 TAA', 1),      -- id_moto = 1
('Yamaha MT-15', '1235 TAA', 1),       -- id_moto = 2
('Honda CB500F', '2234 TAA', 2),       -- id_moto = 3
('Yamaha R15 V3', '2235 TAA', 2),      -- id_moto = 4
('TVS Apache RTR', '3236 TAA', 3),     -- id_moto = 5
('Hero Splendor Plus', '3237 TAA', 3); -- id_moto = 6

-- taxi_Consommation_moto (CORRIGÉ : utiliser les bons IDs)
INSERT INTO taxi_consommation_moto (id_moto, consommation_par_100km) VALUES
(1, 2.3),   -- Honda CBR
(2, 2.5),   -- Yamaha MT
(3, 3.5),   -- Honda CB500 (CORRIGÉ : était 5)
(4, 3.0),   -- Yamaha R15 (CORRIGÉ : était 6)
(5, 1.6),   -- TVS (CORRIGÉ : était 11)
(6, 1.4);   -- Hero (CORRIGÉ : était 12)

-- taxi_Salaire_conducteur (CORRIGÉ : utiliser les bons IDs taxi_conducteur)
INSERT INTO taxi_salaire_conducteur (id_conducteur, date_debut, date_fin, pourcentage) VALUES
-- RAKOTO Jean (id=1) : 42%
(1, '2024-12-16', NULL, 42.00),

-- RABE Paul (id=2) : 45%
(2, '2024-11-01', NULL, 45.00),

-- RAMANANTSOA Claire (id=3, CORRIGÉ : était 7) : 44%
(3, '2024-11-01', NULL, 44.00),

-- RASOAMANANA David (id=4, CORRIGÉ : était 8) : 43%
(4, '2024-12-13', NULL, 43.00);

-- taxi_Entretien_moto (CORRIGÉ : utiliser les bons IDs taxi_moto)
INSERT INTO taxi_entretien_moto (id_moto, date_debut, date_fin, pourcentage) VALUES
-- Honda CBR (id=1) : 5% → 6%
(1, '2024-11-01', '2024-12-10', 5.00),
(1, '2024-12-11', NULL, 6.00),

-- Yamaha MT (id=2) : 6% → 6.5%
(2, '2024-11-01', '2024-12-05', 6.00),
(2, '2024-12-06', NULL, 6.50),

-- Honda CB500 (id=3, CORRIGÉ : était 5) : 7.5%
(3, '2024-11-01', NULL, 7.50),

-- Yamaha R15 (id=4, CORRIGÉ : était 6) : 6%
(4, '2024-11-01', NULL, 6.00),

-- TVS (id=5, CORRIGÉ : était 11) : 5%
(5, '2024-11-01', NULL, 5.00),

-- Hero (id=6, CORRIGÉ : était 12) : 4.5%
(6, '2024-11-01', NULL, 4.50);

-- Courses
INSERT INTO taxi_course (id_moto, id_conducteur, date_course, h_depart, lieu_depart, 
                    h_arrivee, lieu_destination, km_effectue, montant, etat) VALUES

-- ========== 16 Décembre 2024 ==========
(6, 4, '2024-12-16', '09:00:00', 'Ankorondrano', '09:50:00', 'Ivato', 17.3, 28000.00, 'insere'),
(3, 1, '2024-12-16', '10:15:00', 'Ivato', '11:00:00', 'Isotry', 14.6, 24000.00, 'insere'),

-- ========== 17 Décembre 2024 ==========
(4, 2, '2024-12-17', '06:45:00', 'Behoririka', '07:30:00', 'Ivato', 15.8, 26000.00, 'insere'),
(1, 3, '2024-12-17', '07:30:00', 'Ivato', '08:10:00', 'Analakely', 15.5, 25000.00, 'insere'),

-- ========== 18 Décembre 2024 ==========
(3, 3, '2024-12-18', '06:30:00', 'Ivato', '07:20:00', 'Ankorondrano', 14.9, 24000.00, 'insere'),
(2, 2, '2024-12-18', '10:00:00', 'Ivato', '10:45:00', 'Isotry', 13.8, 23000.00, 'insere'),

-- ========== 19 Décembre 2024 ==========
(6, 4, '2024-12-19', '06:45:00', 'Ivato', '07:25:00', 'Analakely', 15.5, 25000.00, 'insere'),

-- ========== 20 Décembre 2024 ==========
(1, 1, '2024-12-20', '11:30:00', 'Andohalo', '12:05:00', 'Analakely', 9.4, 16000.00, 'insere'),

-- ========== 21 Décembre 2024 ==========
(3, 1, '2024-12-21', '11:00:00', 'Ivato', '11:50:00', 'Behoririka', 16.2, 27000.00, 'insere'),

-- ========== 25 Décembre 2024 ==========
(6, 4, '2024-12-25', '10:00:00', 'Ivato', '10:50:00', 'Ankorondrano', 16.5, 30000.00, 'insere');




CREATE OR REPLACE VIEW taxi_v_course_lib AS 
SELECT
cod.nom nom_conducteur,cod.prenom prenom_conducteur, m.marque, m.immatriculation,
cs.date_course, cs.h_depart, cs.h_arrivee, cs.lieu_depart, cs.lieu_destination, cs.km_effectue, cs.montant, cs.etat , cs.id_course
FROM taxi_course cs
LEFT JOIN taxi_conducteur cod
ON cs.id_conducteur = cod.id_conducteur
LEFT JOIN taxi_moto m
ON cs.id_moto = m.id_moto;


SELECT *
FROM taxi_v_course_lib 
order by date_course;

UPDATE taxi_course
SET etat = 'valide'
WHERE id_course = 1;

SELECT *
FROM taxi_v_course_lib 
WHERE id_course = 1;


CREATE OR REPLACE VIEW v_moto_all_lib AS
SELECT
m.id_moto, m.marque, m.immatriculation,
car.type, car.prix, cm.consommation_par_100km
FROM taxi_moto m
LEFT JOIN taxi_carburant car
ON m.id_carburant = car.id_carburant
LEFT JOIN taxi_consommation_moto cm
ON cm.id_moto = m.id_moto
