CREATE DATABASE NadorCars;
USE NadorCars;

CREATE TABLE Client (
    Cin varchar(10) primary key,
    Nom varchar(60) not null ,
    Prenom varchar(60) not null,
    Nationalite varchar(60) not null,
	Telephone varchar(60) not null, 
    Permis varchar(60) not null,
    Observation text null
);
delimiter // 
CREATE PROCEDURE SP_AddClient(Cin varchar(10),Nom varchar(60),Prenom varchar(60),
							Nationalite varchar(60),Telephone varchar(60),Permis varchar(60),Observation text)
BEGIN
    INSERT INTO Client VALUES (Cin, Nom, Prenom, Nationalite, telephone,Permis, Observation);
end //
delimiter ;

delimiter // 
CREATE PROCEDURE SP_DeleteClient(c varchar(50))
BEGIN
    delete from Client where Cin = c;
end //
delimiter ;

delimiter // 
CREATE PROCEDURE SP_GetAllClient()
BEGIN
	select * from Client;
end //
delimiter ;

delimiter // 
CREATE PROCEDURE SP_UpdateClient(OldCin varchar(10),NewCin varchar(10),N varchar(60),P varchar(60),
							Natio varchar(60),Tele varchar(60),Per varchar(60),Obser text)
BEGIN
	update Client set Cin = NewCin ,Nom = N,Prenom = P,Nationalite = Natio,Telephone = Tele,Permis = Per,
    Observation = Obser where Cin = OldCin;
end //
delimiter ;

delimiter // 
CREATE PROCEDURE SP_FindClient(info varchar(100))
BEGIN
	SELECT * FROM Client WHERE
				(Cin REGEXP info OR
                Nom REGEXP info OR
                Prenom REGEXP info OR
                Nationalite REGEXP info OR
                Telephone REGEXP info OR
                Permis REGEXP info OR
                Observation REGEXP info);
end //
delimiter ;






CREATE TABLE Voiture (
    Matricule varchar(50) primary key,
    Marque varchar(50) not null,
    model varchar(50) not null,
    energy varchar(50) not null , 
    couleur varchar(50) not null,
    Observation text null
);

CREATE TABLE Reservation (
	id int auto_increment ,
    Cin varchar(10) not null,
    Matricule varchar(50) not null, 
    DateDebut date not null,
    DateFin date not null,
	prix decimal(8,2) not null CHECK (prix >= 0),
    primary key(id,Cin,Matricule,DateDebut) ,
    FOREIGN KEY (Matricule) REFERENCES Voiture(Matricule) ,
    FOREIGN KEY (Cin) REFERENCES Client(Cin)
);
CREATE TABLE Admin (
    Login varchar(60) primary key,
    MotPass varchar(150) not null
);
insert into Admin values("Admin","Admin") ;











