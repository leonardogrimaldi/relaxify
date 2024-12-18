-- *********************************************
-- * SQL PostgreSQL generation                 
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Dec 18 10:10:05 2024 
-- * LUN file: C:\Moje stvari\Universita\Web\elaborato_web\schema_er\Relaxify.lun 
-- * Schema: Logico/2 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Logico;


-- Tables Section
-- _____________ 

create table Admin (
     adminID numeric(1) not null,
     email varchar(100) not null,
     password varchar(40) not null);

create table Categoria (
     categoriaID varchar(2) not null,
     nome varchar(50) not null,
     descrizione varchar(255) not null,
     constraint ID_Categoria primary key (categoriaID));

create table Ordine (
     utenteID numeric(3) not null,
     ordineID numeric(4) not null,
     data date not null,
     stato char(1) not null,
     totale numeric(4,2) not null,
     constraint ID_Ordine_ID primary key (ordineID, utenteID));

create table Prodotto (
     prodottoID numeric(3) not null,
     nome varchar(100) not null,
     descrizione varchar(255) not null,
     prezzo numeric(3,2) not null,
     categoriaID varchar(2) not null,
     constraint ID_Prodotto primary key (prodottoID));

create table prodotto_carrello (
     prodottoID numeric(3) not null,
     utenteID numeric(3) not null,
     quantita numeric(2) not null,
     constraint ID_prodotto_carrello primary key (prodottoID, utenteID));

create table prodotto_ordine (
     ordineID numeric(4) not null,
     utenteID numeric(3) not null,
     prodottoID numeric(3) not null,
     quantita numeric(2) not null,
     constraint ID_prodotto_ordine primary key (ordineID, utenteID, prodottoID));

create table prodotto_preferito (
     prodottoID numeric(3) not null,
     utenteID numeric(3) not null,
     constraint ID_prodotto_preferito primary key (utenteID, prodottoID));

create table Utente (
     utenteID numeric(3) not null,
     nome varchar(50) not null,
     cognome varchar(50) not null,
     email varchar(100) not null,
     password varchar(40) not null,
     indirizzo varchar(100) not null,
     citta varchar(50) not null,
     provincia char(2) not null,
     constraint ID_Utente primary key (utenteID));


-- Constraints Section
-- ___________________ 

--Not implemented
--alter table Ordine add constraint ID_Ordine_CHK
--     check(exists(select * from prodotto_ordine
--                  where prodotto_ordine.ordineID = ordineID and prodotto_ordine.utenteID = utenteID)); 

alter table Ordine add constraint FK_utente_ordine_FK
     foreign key (utenteID)
     references Utente;

alter table Prodotto add constraint FK_categoria_prodotto_FK
     foreign key (categoriaID)
     references Categoria;

alter table prodotto_carrello add constraint FK_utente_prodotto_carrello_FK
     foreign key (utenteID)
     references Utente;

alter table prodotto_carrello add constraint FK_prodotto_prodotto_carrello
     foreign key (prodottoID)
     references Prodotto;

alter table prodotto_ordine add constraint FK_prodotto_prodotto_ordine_FK
     foreign key (prodottoID)
     references Prodotto;

alter table prodotto_ordine add constraint FK_ordine_prodotto_ordine
     foreign key (ordineID, utenteID)
     references Ordine;

alter table prodotto_preferito add constraint FK_utente_prodotto_preferito
     foreign key (utenteID)
     references Utente;

alter table prodotto_preferito add constraint FK_prodotto_prodotto_preferito_FK
     foreign key (prodottoID)
     references Prodotto;


-- Index Section
-- _____________ 

create index FK_utente_ordine_IND
     on Ordine (utenteID);

create index FK_categoria_prodotto_IND
     on Prodotto (categoriaID);

create index FK_utente_prodotto_carrello_IND
     on prodotto_carrello (utenteID);

create index FK_prodotto_prodotto_ordine_IND
     on prodotto_ordine (prodottoID);

create index FK_prodotto_prodotto_preferito_IND
     on prodotto_preferito (prodottoID);

