-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Dec 18 10:09:55 2024 
-- * LUN file: C:\Moje stvari\Universita\Web\elaborato_web\schema_er\Relaxify.lun 
-- * Schema: Logico/2 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Logico;
use Logico;


-- Tables Section
-- _____________	 

create table Admin (
     adminID int not null AUTO_INCREMENT,
     email varchar(100) not null,
     password varchar(40) not null,
     constraint ID_Admin_ID primary key (adminID));

create table Categoria (
     categoriaID int(1) not null AUTO_INCREMENT,
     nome varchar(50) not null,
     descrizione varchar(255) not null,
     constraint ID_Categoria_ID primary key (categoriaID));

create table Ordine (
     utenteID int not null,
     ordineID int not null,
     data date not null,
     stato char(1) not null,
     totale decimal(4,2) not null,
     constraint ID_Ordine_ID primary key (ordineID, utenteID));

create table Prodotto (
     prodottoID int(2) not null AUTO_INCREMENT,
     nome varchar(100) not null,
     descrizione varchar(255) not null,
     prezzo decimal(3,2) not null,
     categoriaID varchar(2) not null,
     constraint ID_Prodotto_ID primary key (prodottoID));

create table prodotto_carrello (
     prodottoID int not null,
     utenteID int not null,
     quantita int not null,
     constraint ID_prodotto_carrello_ID primary key (prodottoID, utenteID));

create table prodotto_ordine (
     ordineID int not null,
     utenteID int not null,
     prodottoID int not null,
     quantita int not null,
     constraint ID_prodotto_ordine_ID primary key (ordineID, utenteID, prodottoID));

create table prodotto_preferito (
     prodottoID int not null,
     utenteID int not null,
     constraint ID_prodotto_preferito_ID primary key (utenteID, prodottoID));

create table Utente (
     utenteID int(2) not null AUTO_INCREMENT,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     email varchar(100) not null,
     password varchar(40) not null,
     indirizzo varchar(100) not null,
     citta varchar(50) not null,
     provincia char(2) not null,
     constraint ID_Utente_ID primary key (utenteID));


-- Constraints Section
-- ___________________ 

-- Not implemented
-- alter table Ordine add constraint ID_Ordine_CHK
--     check(exists(select * from prodotto_ordine
--                  where prodotto_ordine.ordineID = ordineID and prodotto_ordine.utenteID = utenteID)); 

alter table Ordine add constraint FK_utente_ordine
     foreign key (utenteID)
     references Utente (utenteID);

alter table Prodotto add constraint FK_categoria_prodotto
     foreign key (categoriaID)
     references Categoria (categoriaID);

alter table prodotto_carrello add constraint FK_utente_prodotto_carrello
     foreign key (utenteID)
     references Utente (utenteID);

alter table prodotto_carrello add constraint FK_prodotto_prodotto_carrello
     foreign key (prodottoID)
     references Prodotto (prodottoID);

alter table prodotto_ordine add constraint FK_prodotto_prodotto_ordine
     foreign key (prodottoID)
     references Prodotto (prodottoID);

alter table prodotto_ordine add constraint FK_ordine_prodotto_ordine
     foreign key (ordineID, utenteID)
     references Ordine (ordineID, utenteID);

alter table prodotto_preferito add constraint FK_utente_prodotto_preferito
     foreign key (utenteID)
     references Utente (utenteID);

alter table prodotto_preferito add constraint FK_prodotto_prodotto_preferito
     foreign key (prodottoID)
     references Prodotto (prodottoID);


-- Index Section
-- _____________ 

create unique index ID_Categoria_IND
     on Categoria (categoriaID);

create unique index ID_Ordine_IND
     on Ordine (ordineID, utenteID);

create index FK_utente_ordine_IND
     on Ordine (utenteID);

create unique index ID_Prodotto_IND
     on Prodotto (prodottoID);

create index FK_categoria_prodotto_IND
     on Prodotto (categoriaID);

create unique index ID_prodotto_carrello_IND
     on prodotto_carrello (prodottoID, utenteID);

create index FK_utente_prodotto_carrello_IND
     on prodotto_carrello (utenteID);

create unique index ID_prodotto_ordine_IND
     on prodotto_ordine (ordineID, utenteID, prodottoID);

create index FK_prodotto_prodotto_ordine_IND
     on prodotto_ordine (prodottoID);

create unique index ID_prodotto_preferito_IND
     on prodotto_preferito (utenteID, prodottoID);

create index FK_prodotto_prodotto_preferito_IND
     on prodotto_preferito (prodottoID);

create unique index ID_Utente_IND
     on Utente (utenteID);

