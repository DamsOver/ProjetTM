drop database if exists programmer_bdd; /*id16658863_programmer_bdd*/
create database if not exists programmer_bdd character set = 'utf8';

use programmer_bdd;

create table if not exists utilisateur (
    mail varchar(40) not null,
    pseudo varchar(20) not null,
    motDePasse varchar(255) not null,
    photoprofil MEDIUMBLOB,
    role TINYINT not null,
    primary key(mail)
)engine=innodb;

create table if not exists categorie (
    nomcat varchar(20) not null,
    primary key(nomcat)
)engine=innodb;

create table if not exists theme (
    nomtheme varchar(20) not null,
    mail varchar(40) not null,
    nomcat varchar(20) not null,
    primary key(nomtheme),
    key(mail),
    key(nomcat)
)engine=innodb;

create table if not exists topic (
    idtopic int not null auto_increment,
    nomtopic varchar(50) not null,
    mail varchar(40) not null,
    nomtheme varchar(20) not null,
    primary key(idtopic),
    key(mail),
    key(nomtheme)
) engine=innodb;

create table if not exists commentaire (
    idcom int not null auto_increment,
    texte varchar(280) not null,
    dateajout date not null,
    mail varchar(40) not null,
    idtopic int not null,
    primary key(idcom),
    key(mail),
    key(idtopic)
) engine=innodb;

create table if not exists likecom (
    mail varchar(40) not null,
    idcom int not null,
    primary key(mail, idcom),
    key(idcom)
) engine=innodb;

alter table theme add constraint fkthemeutilisateur foreign key(mail) references utilisateur(mail),
add constraint fkthemecategorie foreign key(nomcat) references categorie(nomcat);

alter table topic add constraint fktopicutilisateur foreign key(mail) references utilisateur(mail),
add constraint fktopictheme foreign key(nomtheme) references theme(nomtheme);

alter table commentaire add constraint fkcommentaireutilisateur foreign key(mail) references utilisateur(mail),
add constraint fkcommentairetopic foreign key(idtopic) references topic(idtopic);

alter table likecom add constraint likecomutilisateur foreign key(mail) references utilisateur(mail),
add constraint likecomcommentaire foreign key(idcom) references commentaire(idcom);