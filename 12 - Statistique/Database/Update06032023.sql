CREATE DATABASE Statistique;
USE Statistique;

CREATE TABLE Client (
    Cin varchar(10) primary key,
    Nom varchar(60) not null ,
    Prenom varchar(60) not null,
    Nationalite varchar(60) not null,
	Telephone varchar(60) not null, 
    Permis varchar(60) not null,
    Observation text null
);
CREATE TABLE Cars (
    Matricule varchar(50) primary key,
    Marque varchar(50) not null,
    model varchar(50) not null,
    type varchar(50) not null , 
    cin varchar(10) null,
    foreign key(cin) references Client(cin) on delete cascade on update cascade
);

insert into Client VALUES ('AB123456', 'Smith', 'John', 'British', '0612345678', 'B', null),
('EF789012', 'Badi', 'Oussama', 'Marocaine', '0612345679', 'C', 'Regular client'),
('EF78901k2', 'Bomdien', 'Mohamed', 'Marocaine', '0612345680', 'D', null),
('GH234567', 'Daoudi', 'Bilal', 'Marocaine', '0612345681', 'A', 'Special request'),
('IJ345678', 'Oukkoa', 'Outhman', 'Marocaine', '0612345682', 'B', null),
('KL567890', 'Bentahra', 'Mohamed', 'Marocaine', '0612345683', 'C', null),
('MN678901', 'Ouelhadj', 'Omar', 'Marocaine', '0612345684', 'D', null),
('OP789012', 'Badi', 'Issam', 'Marocaine', '0612345685', 'A', null),
('QR890123', 'Oualli', 'Walid', 'Marocaine', '0612345686', 'B', null),
('ST901234', 'Amghar', 'Mohamed', 'Marocaine', '0612345687', 'C', null);
INSERT INTO Cars (Matricule, Marque, model, type,  cin)
		VALUES ('AA-12v3-BB1', 'Peugeot', '208', 'Compact',  'AB123456'),
		('BBfd-456-CC', 'Renault', 'Clio', 'Luxe', 'AB123456'),
		('CC-7df89-DD', 'Volkswagen', 'Golf', 'Suv',  'AB123456'),
		('DD-234f-EE', 'Ford', 'Fiesta', 'Automatic', 'AB123456'),
		('EE-567-sFF', 'Audi', 'A4', 'Sedev',  'AB123456'),
		('FF-890-sGG', 'Toyota', 'Yaris', 'Basique',  'AB123456'),
		('GG-123-sHH', 'BMW', 'Series 3', 'Basique',  'AB123456'),
		('HH-456-qII', 'Opel', 'Corsa', 'Automatic',  'AB123456'),
		('II-789-wxJJ', 'Mercedes', 'Class A', 'Suv', 'AB123456'),
		('JJ-234-sKK', 'Fiat', '500', 'Suv', 'AB123456');

	INSERT INTO Cars (Matricule, Marque, model, type,  cin)
		VALUES ('AA-123-BcB1', 'Peugeot', '208', 'Compact',  'ST901234'),
		('BB-4556-cCC', 'Renault', 'Clio', 'Luxe', 'QR890123'),
		('CC-7859-cDD', 'Volkswagen', 'Golf', 'Suv',  'MN678901'),
		('DD-2345-EcE', 'Ford', 'Fiesta', 'Automatic', 'MN678901'),
		('EE-567-5FcF', 'Audi', 'A4', 'Sedev',  'KL567890'),
		('FF-890-G5cG', 'Toyota', 'Yaris', 'Basique',  'IJ345678'),
		('GG-123-Hc5H', 'BMW', 'Series 3', 'Basique',  'QR890123'),
		('HH-4556-IcI', 'Opel', 'Corsa', 'Automatic',  'OP789012'),
		('II-5789-JcJ', 'Mercedes', 'Class A', 'Suv', 'ST901234'),
		('JJ-2354-KcK', 'Fiat', '500', 'Suv', 'OP789012');
INSERT INTO Cars (Matricule, Marque, model, type,  cin)
		VALUES ('AA-123-BB1', 'Peugeot', '208', 'Compact',  'ST901234'),
		('BB-456-CC', 'Renault', 'Clio', 'Luxe', 'QR890123'),
		('CC-789-DD', 'Volkswagen', 'Golf', 'Suv',  'MN678901'),
		('DD-234-EE', 'Ford', 'Fiesta', 'Automatic', 'MN678901'),
		('EE-567-FF', 'Audi', 'A4', 'Sedev',  'KL567890'),
		('FF-890-GG', 'Toyota', 'Yaris', 'Basique',  'IJ345678'),
		('GG-123-HH', 'BMW', 'Series 3', 'Basique',  'QR890123'),
		('HH-456-II', 'Opel', 'Corsa', 'Automatic',  'OP789012'),
		('II-789-JJ', 'Mercedes', 'Class A', 'Suv', 'ST901234'),
		('JJ-234-KK', 'Fiat', '500', 'Suv', 'OP789012');
        
        INSERT INTO Cars (Matricule, Marque, model, type,  cin)
		VALUES ('AA-123c-BcB1', 'Peugeot', '208', 'Compact',  'ST901234'),
		('BB-456-cCC', 'Renault', 'Clio', 'Luxe', 'QR890123'),
		('CC-789-cDD', 'Volkswagen', 'Golf', 'Suv',  'MN678901'),
		('DD-234-EcE', 'Ford', 'Fiesta', 'Automatic', 'MN678901'),
		('EE-567-FcF', 'Audi', 'A4', 'Sedev',  'KL567890'),
		('FF-890-GcG', 'Toyota', 'Yaris', 'Basique',  'IJ345678'),
		('GG-123-HcH', 'BMW', 'Series 3', 'Basique',  'QR890123'),
		('HH-456-IcI', 'Opel', 'Corsa', 'Automatic',  'OP789012'),
		('II-789-JcJ', 'Mercedes', 'Class A', 'Suv', 'ST901234'),
		('JJ-234-KcK', 'Fiat', '500', 'Suv', 'OP789012');
        
	INSERT INTO Cars (Matricule, Marque, model, type,  cin)
		VALUES ('AA-1d23-BcB1', 'Peugeot', '208', 'Compact',  'ST901234'),
		('BB-4556-cCfC', 'Renault', 'Clio', 'Luxe', 'QR890123'),
		('CC-7859-v', 'Volkswagen', 'Golf', 'Suv',  'MN678901'),
		('DD-2345-v', 'Ford', 'Fiesta', 'Automatic', 'MN678901'),
		('EE-567-v', 'Audi', 'A4', 'Sedev',  'KL567890'),
		('FF-890-v', 'Toyota', 'Yaris', 'Basique',  'IJ345678'),
		('GG-123-v', 'BMW', 'Series 3', 'Basique',  'QR890123'),
		('HH-4556-v', 'Opel', 'Corsa', 'Automatic',  'OP789012'),
		('II-5789-v', 'Mercedes', 'Class A', 'Suv', 'ST901234'),
		('JJ-2354-v', 'Fiat', '500', 'Suv', 'OP789012');

