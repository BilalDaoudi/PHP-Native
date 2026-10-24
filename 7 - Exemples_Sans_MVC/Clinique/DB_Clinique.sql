CREATE DATABASE Clinique;
USE Clinique;
CREATE TABLE medecin(
	NumMedecin int PRIMARY key,
    Nom varchar(30) not null,
    Prenom varchar(40) not null,
    Specialite varchar(30) not null,
    Tel varchar(20) not null,
    LoginMedecin varchar(100) not null,
    Pass varchar(60) not null
);

CREATE TABLE Patient(
	NumPatient int PRIMARY key,
    Nom varchar(30) not null,
    Prenom varchar(40) not null,
    DateNaissance date not null,
    Tel varchar(20) not null,
    LoginPatient varchar(100) not null,
    Pass varchar(60) not null
);


CREATE TABLE Ordonnance(
    NumOrdonnance int PRIMARY key,
    NumMedecin int,
	NumPatient int ,
    DateOrdonnance date not null,
    CONSTRAINT fk_medecin FOREIGN key(NumMedecin) REFERENCES medecin(NumMedecin),
    CONSTRAINT fk_patient FOREIGN key(NumPatient) REFERENCES Patient(NumPatient)
);