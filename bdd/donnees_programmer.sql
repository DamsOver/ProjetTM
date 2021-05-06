/*
insert into utilisateur(mail, pseudo, motDePasse, role) values ('damien@me.com','damien', 'helha2020','3');
insert into utilisateur(mail, pseudo, motDePasse, role) values ('martin@me.com','martin', 'helha2020','2');
insert into utilisateur(mail, pseudo, motDePasse, role) values ('florian@me.com','florian', 'helha2020','1');
insert into utilisateur(mail, pseudo, motDePasse, role) values ('florian@me.com','floran', 'helha2020','1');
*/

update utilisateur set role = '3' where mail = "damien@me.com";
update utilisateur set role = '2' where mail = "martin@me.com";
update utilisateur set role = '1' where mail = "florian@me.com";
update utilisateur set role = '1' where mail = "floran@me.com";

insert into categorie(nomcat) values ('Jeux Video');
insert into categorie(nomcat) values ('Pays');
insert into categorie(nomcat) values ('Programmation');
insert into categorie(nomcat) values ('Site Web');
insert into categorie(nomcat) values ('OS');

insert into theme(nomtheme, mail, nomcat) values ('Xbox One','damien@me.com', 'Jeux Video');
insert into theme(nomtheme, mail, nomcat) values ('PS4','damien@me.com', 'Jeux Video');

insert into theme(nomtheme, mail, nomcat) values ('Belgique','damien@me.com', 'Pays');
insert into theme(nomtheme, mail, nomcat) values ('France','damien@me.com', 'Pays');
insert into theme(nomtheme, mail, nomcat) values ('Suisse','damien@me.com', 'Pays');

insert into theme(nomtheme, mail, nomcat) values ('C++','damien@me.com', 'Programmation');
insert into theme(nomtheme, mail, nomcat) values ('Java','damien@me.com', 'Programmation');
insert into theme(nomtheme, mail, nomcat) values ('Python','damien@me.com', 'Programmation');

insert into theme(nomtheme, mail, nomcat) values ('HTML/CSS','damien@me.com', 'Site Web');
insert into theme(nomtheme, mail, nomcat) values ('Javascript','damien@me.com', 'Site Web');
insert into theme(nomtheme, mail, nomcat) values ('PHP','damien@me.com', 'Site Web');

insert into theme(nomtheme, mail, nomcat) values ('Windows','damien@me.com', 'Systèmes d\'exploitation');
insert into theme(nomtheme, mail, nomcat) values ('MacOs','damien@me.com', 'Systèmes d\'exploitation');
insert into theme(nomtheme, mail, nomcat) values ('Linux','damien@me.com', 'Systèmes d\'exploitation');



insert into topic(nomtopic, mail, nomtheme) values ('Comment créer un menu déroulant ?', 'damien@me.com','JavaScript');
insert into topic(nomtopic, mail, nomtheme) values ('Comment faire une requete ajax ?', 'damien@me.com','JavaScript');

insert into commentaire(texte, dateajout, mail, idtopic) values ('Bonjour jai un problème comment le résoudre?', '2021-04-26','damien@me.com', '5');
insert into commentaire(texte, dateajout, mail, idtopic) values ('Comment fo faire ?', '2021-04-27','damien@me.com', '6');

/*insert into likecom(mail, idcom) values ('damien@me.com','1');
insert into likecom(mail, idcom) values ('martin@me.com','2');
insert into likecom(mail, idcom) values ('florian@me.com','1');*/
