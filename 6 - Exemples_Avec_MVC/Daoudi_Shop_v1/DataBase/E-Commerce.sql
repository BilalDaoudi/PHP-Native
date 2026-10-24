
create database E_Commerce;
use E_Commerce;

create table Admins(
Login varchar(60) primary key,
MotPass varchar(150) not null,
Nom varchar(30) not null,
Prenom varchar(30) not null 
);

create table Categorie(
IdCategorie int auto_increment primary key,
DescriptionCat varchar(150) not null,
PhotoCategorie varchar(100) not null
);

create table Article(
CodeArticle varchar(15) primary key,
DescriptionArticle varchar(150) not null,
PhotoArticle varchar(100) not null,
Prix_Unitaire double not null,
QuantiteStocke int not null,
IdCategorie int ,
constraint fk_IdCat foreign key(IdCategorie) references Categorie(IdCategorie) on delete cascade on update cascade
);

create table Facture(
NumeroFacture int AUTO_INCREMENT primary key,
NomClient varchar(60) not null,
EmailClient varchar(150) not null,
TelephoneClient varchar(20) not null,
AdresseClient varchar(200) not null,
DateFacture datetime not null
);

create table LingneFacture(
CodeArticle varchar(15) not null,
NumeroFacture int not null,
Quantite int not null,
primary key(CodeArticle,NumeroFacture),
constraint fk_CodeArticle foreign key(CodeArticle) references Article(CodeArticle) on delete cascade on update cascade,
constraint fk_NumeroFacture foreign key(NumeroFacture) references Facture(NumeroFacture) on delete cascade on update cascade
);

INSERT INTO Admins VALUES ("Admin","$2y$10$CBAKD3Ptzm03As0gBtyBnu8xRmyUQwpD8zKSEU7LwHP91REvW4CKi","Daoudi","Bilal");

INSERT INTO Categorie(DescriptionCat,PhotoCategorie) VALUES 
("Pontalon","Photo_E-Commerce/Pontalons.jpg"),
("Chemise","Photo_E-Commerce/Chemises.jpg"),
("Chaussure","Photo_E-Commerce/Chaussures.jpeg"),
("Mobilier","Photo_E-Commerce/Mobiliers.jpg");

INSERT INTO Article VALUES
("PHS1","Pontalon Homme Slime","Photo_E-Commerce/PHS1.jpg",199,10,1),
("PHS2","Pontalon Homme Slime","Photo_E-Commerce/PHS2.jpg",179,10,1),
("PT1","Pontalon Treillis Italien Vegetato","Photo_E-Commerce/PT1.jpg",249,10,1),
("PT2","Pontalon Treillis Enfant Junior","Photo_E-Commerce/PT2.jpg",249,10,1),
("PP1","Pontalon Polo Brond Alley","Photo_E-Commerce/PP1.jpg",199,10,1),
("PP2","Pontalon HV Polo","Photo_E-Commerce/PP2.jpg",179,10,1),
("PCh1","Pontalon Cheveilles Femme","Photo_E-Commerce/PCh1.jpg",149,10,1),
("PCH2","Pontalon Classique de Homme","Photo_E-Commerce/PCH2.jpg",199,10,1),
("PAd1","Pontalon Adidas Originale Homme","Photo_E-Commerce/PAd1.jpg",149,10,1),
("PS1","Pontalon de Sport","Photo_E-Commerce/PS1.jpg",249,10,1);


INSERT INTO Article VALUES
("ChZA1","Chemise Zealand Auckland Homme","Photo_E-Commerce/ChZA1.jpg",199,10,2),
("ChZA2","Chemise Zealand Auckland Homme","Photo_E-Commerce/ChZA2.jpg",199,10,2),
("ChFH1","Chemise Freicit-Herden","Photo_E-Commerce/ChFH1.jpg",179,10,2),
("ChM1","Chemise Manches Longues","Photo_E-Commerce/ChM1.jpg",189,10,2),
("ChK1","Chemise Kogno","Photo_E-Commerce/ChK1.jpeg",189,10,2),
("ChNi1","Chemise Nike Air Blanc","Photo_E-Commerce/ChNi1.jpg",99,10,2),
("ChNi2","Chemise Nike Drifit Swoosh Blanck","Photo_E-Commerce/ChNi2.jpg",99,10,2),
("ChNi3","Chemise Nike de Homme","Photo_E-Commerce/ChNi3.jpg",99,10,2),
("ChAd1","Chemise Adidas de Sport","Photo_E-Commerce/ChAd1.jpg",149,10,2),
("ChAd2","Chemise Adidas de Femme","Photo_E-Commerce/ChAd2.jpg",149,10,2);

INSERT INTO Article VALUES
("CL1","Chaussure Lacoste Marron Homme","Photo_E-Commerce/CL1.png",199,10,3),
("CTN1","Chaussure Nike Tn Noir","Photo_E-Commerce/CTN1.jpg",299,10,3),
("CTN2","Chaussure Nike Tn Blanck","Photo_E-Commerce/CTN2.jpg",299,10,3),
("CTN3","Chaussure Nike Tn Rouge","Photo_E-Commerce/CTN3.jpg",299,10,3),
("CP1","Chaussure Puma Rouge","Photo_E-Commerce/CP1.jpg",179,10,3),
("CP2","Chaussure Puma de Sport","Photo_E-Commerce/CP2.jpeg",199,10,3),
("CAd1","Chaussure Adidas de Sport","Photo_E-Commerce/CAd1.jpg",249,10,3),
("CAd2","Chaussure Adidas de Homme","Photo_E-Commerce/CAd2.jpg",299,10,3),
("CNF1","Chaussure Nike Air Force","Photo_E-Commerce/CNF1.jpg",229,10,3),
("CNF2","Chaussure Nike Air Force","Photo_E-Commerce/CNF2.jpg",229,10,3);


INSERT INTO Article VALUES
("MCC1","Conapé Cuir Blanc","Photo_E-Commerce/MCC1.png",499,10,4),
("MCh1","Chaise de Style Device Vert","Photo_E-Commerce/MCh1.jpg",199,10,4),
("MLT1","Lit Isolé Surfond Blanc","Photo_E-Commerce/MLT1.jpg",1299,10,4),
("MMC1","Mobilier Moderne Confortable Surfond Blanc","Photo_E-Commerce/MMC1.jpg",899,10,4),
("MMC2","Mobilier Moderne Confortable Surfond Gris","Photo_E-Commerce/MMC2.jpg",799,10,4),
("MM1","Mobilier Meuble","Photo_E-Commerce/MM1.jpg",999,10,4),
("MCh2","Chaise Blanc","Photo_E-Commerce/MCh2.jpg",349,10,4),
("MB1","Mobilier de Bureau","Photo_E-Commerce/MB1.jpg",1399,10,4),
("MT1","Mobilier Table Avec 5 Chaise","Photo_E-Commerce/MT1.jpg",1299,10,4),
("MM2","Meuble TV","Photo_E-Commerce/MM2.jpg",499,10,4);

