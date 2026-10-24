create database MesSitesWeb;
use MesSitesWeb;
create table Categories(
id int auto_increment primary key,
Nom  varchar(255),
Description text);

create table Sitesweb(
id int auto_increment primary key,
lien varchar(255),
description text,
idCategorie int,
foreign key(idCategorie) references Categories(id)
);

delimiter $ 
create procedure SP_getAllCategories()
begin
	select * from Categories order by nom asc;
end$
delimiter ; 
delimiter $ 
create procedure SP_getAllSitesweb()
begin
	select s.id,s.lien,s.description,c.nom  from Sitesweb s 
    inner join categories c on c.id = s.idcategorie
    order by lien asc;
end$
delimiter ; 


delimiter $ 
create procedure SP_AddCategorie(NomCat varchar(255),DescrCat text)
begin
	insert into Categories(Nom,Description) values(NomCat,DescrCat);
end$
delimiter ; 

delimiter $ 
create procedure SP_DeleteCategorie(idCat int)
begin
	delete from Categories where id = idCat;
end$
delimiter ; 



delimiter $ 
create procedure SP_AddSiteWeb(lienSite varchar(255),DescrSite text,idcat int)
begin
	insert into Sitesweb(lien,Description,idCategorie) values(lienSite,DescrSite,idcat);
end$
delimiter ; 

delimiter $ 
create procedure SP_DeleteSiteWeb(idSite int)
begin
	delete from Sitesweb where id = idSite;
end$
delimiter ; 

