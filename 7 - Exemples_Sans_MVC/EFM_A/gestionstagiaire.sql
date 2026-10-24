CREATE DATABASE GestionStagiaire_v1;
USE GestionStagiaire_v1;
CREATE TABLE CompteAdministrateur(
    login varchar(50) PRIMARY KEY,
    MotPasse varchar(10),
    Nom varchar(20),
    Prenom varchar(20)
);
CREATE TABLE Filiere(
    IdFiliere varchar(5) PRIMARY KEY,
    Intitule varchar(20),
    NomGroupe int(11)
);
CREATE TABLE Stagiaire(
    IdStagiaire int(11) PRIMARY KEY,
    Nom varchar(20),
    Prenom varchar(20),
    DateNaissance date,
    PhotoProfil text,
    IdFiliere varchar(5),
    CONSTRAINT fk_idF FOREIGN KEY(IdFiliere) REFERENCES Filiere(IdFiliere)
);
INSERT INTO compteadministrateur VALUES("Bilal","123","Daoudi","Bilal");

insert INTO Filiere VALUES("Dev12","Developpement 102",25),
("Dev13","Developpement 103",25),
("Dev11","Developpement 101",25);


insert INTO Statiaire(Nom,Prenom,DateNaissance,PhotoProfil,IdFiliere) VALUES("Bouabid","Nouzha","2004-03-23","photo/100.jpeg","Dev12");