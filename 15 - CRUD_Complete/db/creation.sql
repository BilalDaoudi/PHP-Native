
drop DATABASE  CRUD_Complete;
create DATABASE IF NOT EXISTS CRUD_Complete;
use CRUD_Complete;
create table personnes (
    id int primary key auto_increment,
    photo varchar(255),
    nom varchar(255),
    genre varchar(255),
    matricule varchar(255),
    datenaissance date,
    datecreation date,
    datesuppression date
);



INSERT INTO personnes (photo, nom, genre, matricule, datenaissance, datecreation, datesuppression) VALUES
('photo1.jpg', 'Nom1', 'Homme', 'M001', '1990-01-01', '2023-06-01', NULL),
('photo2.jpg', 'Nom2', 'Femme', 'M002', '1991-02-02', '2023-06-02', NULL),
('photo3.jpg', 'Nom3', 'Homme', 'M003', '1992-03-03', '2023-06-03', NULL),
('photo4.jpg', 'Nom4', 'Femme', 'M004', '1993-04-04', '2023-06-04', NULL),
('photo5.jpg', 'Nom5', 'Homme', 'M005', '1994-05-05', '2023-06-05', NULL),
('photo6.jpg', 'Nom6', 'Femme', 'M006', '1995-06-06', '2023-06-06', NULL),
('photo7.jpg', 'Nom7', 'Homme', 'M007', '1996-07-07', '2023-06-07', NULL),
('photo8.jpg', 'Nom8', 'Femme', 'M008', '1997-08-08', '2023-06-08', NULL),
('photo9.jpg', 'Nom9', 'Homme', 'M009', '1998-09-09', '2023-06-09', NULL),
('photo10.jpg', 'Nom10', 'Femme', 'M010', '1999-10-10', '2023-06-10', NULL),
('photo11.jpg', 'Nom11', 'Homme', 'M011', '2000-11-11', '2023-06-11', NULL),
('photo12.jpg', 'Nom12', 'Femme', 'M012', '2001-12-12', '2023-06-12', NULL),
('photo13.jpg', 'Nom13', 'Homme', 'M013', '1989-01-13', '2023-06-13', NULL),
('photo14.jpg', 'Nom14', 'Femme', 'M014', '1988-02-14', '2023-06-14', NULL),
('photo15.jpg', 'Nom15', 'Homme', 'M015', '1987-03-15', '2023-06-15', NULL),
('photo16.jpg', 'Nom16', 'Femme', 'M016', '1986-04-16', '2023-06-16', NULL),
('photo17.jpg', 'Nom17', 'Homme', 'M017', '1985-05-17', '2023-06-17', NULL),
('photo18.jpg', 'Nom18', 'Femme', 'M018', '1984-06-18', '2023-06-18', NULL),
('photo19.jpg', 'Nom19', 'Homme', 'M019', '1983-07-19', '2023-06-19', NULL),
('photo20.jpg', 'Nom20', 'Femme', 'M020', '1982-08-20', '2023-06-20', NULL),
('photo21.jpg', 'Nom21', 'Homme', 'M021', '1981-09-21', '2023-06-21', NULL),
('photo22.jpg', 'Nom22', 'Femme', 'M022', '1980-10-22', '2023-06-22', NULL),
('photo23.jpg', 'Nom23', 'Homme', 'M023', '1979-11-23', '2023-06-23', NULL),
('photo24.jpg', 'Nom24', 'Femme', 'M024', '1978-12-24', '2023-06-24', NULL),
('photo25.jpg', 'Nom25', 'Homme', 'M025', '1977-01-25', '2023-06-25', NULL),
('photo26.jpg', 'Nom26', 'Femme', 'M026', '1976-02-26', '2023-06-26', NULL),
('photo27.jpg', 'Nom27', 'Homme', 'M027', '1975-03-27', '2023-06-27', NULL),
('photo28.jpg', 'Nom28', 'Femme', 'M028', '1974-04-28', '2023-06-28', NULL),
('photo29.jpg', 'Nom29', 'Homme', 'M029', '1973-05-29', '2023-06-29', NULL),
('photo30.jpg', 'Nom30', 'Femme', 'M030', '1972-06-30', '2023-06-30', NULL),
('photo31.jpg', 'Nom31', 'Homme', 'M031', '1971-07-01', '2023-07-01', NULL),
('photo32.jpg', 'Nom32', 'Femme', 'M032', '1970-08-02', '2023-07-02', NULL),
('photo33.jpg', 'Nom33', 'Homme', 'M033', '1969-09-03', '2023-07-03', NULL),
('photo34.jpg', 'Nom34', 'Femme', 'M034', '1968-10-04', '2023-07-04', NULL),
('photo35.jpg', 'Nom35', 'Homme', 'M035', '1967-11-05', '2023-07-05', NULL),
('photo36.jpg', 'Nom36', 'Femme', 'M036', '1966-12-06', '2023-07-06', NULL),
('photo37.jpg', 'Nom37', 'Homme', 'M037', '1965-01-07', '2023-07-07', NULL),
('photo38.jpg', 'Nom38', 'Femme', 'M038', '1964-02-08', '2023-07-08', NULL),
('photo39.jpg', 'Nom39', 'Homme', 'M039', '1963-03-09', '2023-07-09', NULL),
('photo40.jpg', 'Nom40', 'Femme', 'M040', '1962-04-10', '2023-07-10', NULL),
('photo41.jpg', 'Nom41', 'Homme', 'M041', '1961-05-11', '2023-07-11', NULL),
('photo42.jpg', 'Nom42', 'Femme', 'M042', '1960-06-12', '2023-07-12', NULL),
('photo43.jpg', 'Nom43', 'Homme', 'M043', '1959-07-13', '2023-07-13', NULL),
('photo44.jpg', 'Nom44', 'Femme', 'M044', '1958-08-14', '2023-07-14', NULL),
('photo45.jpg', 'Nom45', 'Homme', 'M045', '1957-09-15', '2023-07-15', NULL),
('photo46.jpg', 'Nom46', 'Femme', 'M046', '1956-10-16', '2023-07-16', NULL),
('photo47.jpg', 'Nom47', 'Homme', 'M047', '1955-11-17', '2023-07-17', NULL),
('photo48.jpg', 'Nom48', 'Femme', 'M048', '1954-12-18', '2023-07-18', NULL),
('photo49.jpg', 'Nom49', 'Homme', 'M049', '1953-01-19', '2023-07-19', NULL),
('photo50.jpg', 'Nom50', 'Femme', 'M050', '1952-02-20', '2023-07-20', NULL);

delimiter $
create procedure get_personnes()
begin
    select id,photo,nom,matricule,genre,datenaissance,datecreation from personnes where datesuppression is null;
end$
delimiter ;
call get_personnes();

delimiter $
create procedure add_personne(per_photo varchar(255), per_nom varchar(255),per_matricule varchar(255), per_genre varchar(255), per_datenaissance date)
begin
insert into personnes (photo, nom, genre, matricule, datenaissance,datecreation) values(per_photo, per_nom, per_genre, per_matricule, per_datenaissance,now());
end$
delimiter ;

delimiter $
create procedure delete_personne(per_id int)
begin
delete from personnes where id = per_id;
end$
delimiter ;


delimiter $
create procedure update_personne_with_photo(per_id int,per_photo varchar(255), per_nom varchar(255),per_matricule varchar(255), per_genre varchar(255), per_datenaissance date)
begin
update personnes set photo = per_photo, nom = per_nom, matricule = per_matricule, genre = per_genre, datenaissance = per_datenaissance  
where id = per_id;
end$
delimiter ;


delimiter $
create procedure update_personne(per_id int, per_nom varchar(255),per_matricule varchar(255), per_genre varchar(255), per_datenaissance date)
begin
update personnes set nom = per_nom, matricule = per_matricule, genre = per_genre, datenaissance = per_datenaissance  
where id = per_id;
end$
delimiter ;