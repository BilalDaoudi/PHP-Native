create database Ecole;
use Ecole;
create table Formateur(
    Matricule int primary key,
    Nom varchar(60) not null,
    DateNaissance date not null,
    DateEmbauche date not null,
    Salaire double not null,
    HeureSup int,
    RemunerationHSup double,
    Photo
);
create table Agent(
    Matricule int primary key,
    Nom varchar(60) not null,
    DateNaissance date not null,
    DateEmbauche date not null,
    Salaire double not null,
    PrimeResponsabilite int 
);