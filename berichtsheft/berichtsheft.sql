-- Datenbank anlegen
CREATE DATABASE  berichtsheft;
-- Datenbank auswählen
USE berichtheft;
-- Tabelle 'kurse' anlegen
CREATE TABLE kurse (
    id INT AUTO_INCREMENT PRIMARY KEY
    kurs VARCHAR(50)
);

-- Tabelle'lektionen' anlegen
CREATE TABLE lektionen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kursID INT,
    inhalt TEXT,
    datum TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(kursID) REFERENCES kurse(id)
);