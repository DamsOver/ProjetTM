insert into utilisateur(mail, pseudo, motDePasse, role) values ('damien@me.com','damien', 'helha2020','1');
insert into utilisateur(mail, pseudo, motDePasse, role) values ('martin@me.com','martin', 'helha2020','2');
insert into utilisateur(mail, pseudo, motDePasse, role) values ('florian@me.com','florian', 'helha2020','3');

insert into categorie(nomcat) values ('Dev Web');
insert into categorie(nomcat) values ('Pays');

insert into theme(nomtheme, mail, nomcat) values ('JavaScript','florian@me.com', 'Dev Web');
insert into theme(nomtheme, mail, nomcat) values ('PHP','florian@me.com', 'Dev Web');
insert into theme(nomtheme, mail, nomcat) values ('Belgique','florian@me.com', 'Pays');
insert into theme(nomtheme, mail, nomcat) values ('France','florian@me.com', 'Pays');

insert into topic(nomtopic, mail, nomtheme) values ('Comment créer un menu déroulant ?', 'damien@me.com','JavaScript');
insert into topic(nomtopic, mail, nomtheme) values ('Comment faire une requete ajax ?', 'damien@me.com','JavaScript');

insert into commentaire(texte, dateajout, mail, idtopic) values ('Bonjour jai un problème comment le résoudre?', '2021-04-26','damien@me.com', '5');
insert into commentaire(texte, dateajout, mail, idtopic) values ('Comment fo faire ?', '2021-04-27','damien@me.com', '6');



/*insert into likecom(mail, idcom) values ('cyber666@me.com','com#00000001');
insert into likecom(mail, idcom) values ('dadanicolas@me.com','com#00000001');
insert into likecom(mail, idcom) values ('cyber666@me.com','com#00000002');*/
