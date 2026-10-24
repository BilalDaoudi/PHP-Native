CREATE DATABASE Candles;
USE Candles;
CREATE TABLE Client(
	IdClient i
    nt PRIMARY KEY,
    Nom varchar(30) not null,
    Prenom varchar(30) not null,
    DateNaissance date not null,
    Sexe char(1) CHECK(Sexe = 'M' or Sexe = 'F'),
    Ville varchar(50) not null,
    Adresse varchar(100) not null,
    CodePostale int not null,
    Telefone varchar(20) not null,
    Email varchar(150) not null,
    Mot_Pass varchar(150) not null
);

CREATE TABLE Facture(
	NumFacture int AUTO_INCREMENT PRIMARY KEY,
	IdClient int,
    DateFacture date not null,
    CONSTRAINT fk_Idclient FOREIGN KEY(IdClient) REFERENCES Client(IdClient) on DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Article(
	CodeArticle int PRIMARY KEY,
	Designation varchar(300),
    PrixUnitaire double not null,
    QuantiteStocke int not null,
    Image blob
);
CREATE TABLE LingeFacture(
	NumFacture int,
	CodeArticle int,
    Quantite double not null,
    PRIMARY KEY(NumFacture,CodeArticle),
    CONSTRAINT fk_NumFacture FOREIGN KEY(NumFacture) REFERENCES Facture(NumFacture) on DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_CodeArticle FOREIGN KEY(CodeArticle) REFERENCES Article(CodeArticle) on DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO article VALUES (1263,"Candle",100,50),(1264,"Candle",100,50),
(1265,"Candle",100,50),(1266,"Candle",100,50),(1267,"Candle",100,50),
(1268,"Candle",100,50),(1269,"Candle",100,50),(1270,"Candle",100,50),
(1271,"Candle",100,50),(1272,"Candle",100,50),(1273,"Candle",100,50),
(1274,"Candle",100,50),(1275,"Candle",100,50),(1276,"Candle",100,50),

(1277,"Candle",100,50),(1278,"Candle",100,50),(1279,"Candle",100,50),

(1280,"Candle",100,50),(1281,"Candle",100,50),(1282,"Candle",100,50),

(1283,"Candle",100,50),(1284,"Candle",100,50),(1285,"Candle",100,50),
(1286,"Candle",100,50),(1287,"Candle",100,50),(1288,"Candle",100,50),
(1289,"Candle",100,50),(1290,"Candle",100,50);