drop database if exists programmer_bdd; /*id16658863_programmer_bdd*/
create database if not exists programmer_bdd character set = 'utf8';

use programmer_bdd;

create table if not exists utilisateur (
    mail varchar(40) not null,
    pseudo varchar(20) not null,
    motDePasse varchar(255) not null,
    role TINYINT not null,
    primary key(mail)
)engine=innodb;

create table if not exists categorie (
    nomcat varchar(20) not null,
    primary key(nomcat)
)engine=innodb;

create table if not exists theme (
    nomtheme varchar(20) not null,
    mailTheme varchar(40) not null,
    nomcat varchar(20) not null,
    primary key(nomtheme),
    key(mailTheme),
    key(nomcat)
)engine=innodb;

create table if not exists topic (
    idtopic int not null auto_increment,
    nomtopic varchar(50) not null,
    mailTopic varchar(40) not null,
    nomtheme varchar(20) not null,
    dateajoutTopic smalldatetime not null,
    primary key(idtopic),
    key(mailTopic),
    key(nomtheme)
) engine=innodb;

create table if not exists commentaire (
    idcom int not null auto_increment,
    texte varchar(1000) not null,
    dateajoutcom smalldatetime not null,
    mailCom varchar(40) not null,
    idtopic int not null,
    primary key(idcom),
    key(mailCom),
    key(idtopic)
) engine=innodb;

create table if not exists likecom (
    mailLike varchar(40) not null,
    idcom int not null,
    primary key(mailLike, idcom),
    key(idcom)
) engine=innodb;

alter table theme add constraint fkthemeutilisateur foreign key(mailTheme) references utilisateur(mail) on delete cascade,
add constraint fkthemecategorie foreign key(nomcat) references categorie(nomcat) on delete cascade;

alter table topic add constraint fktopicutilisateur foreign key(mailTopic) references utilisateur(mail) on delete cascade,
add constraint fktopictheme foreign key(nomtheme) references theme(nomtheme) on delete cascade;

alter table commentaire add constraint fkcommentaireutilisateur foreign key(mailCom) references utilisateur(mail) on delete cascade,
add constraint fkcommentairetopic foreign key(idtopic) references topic(idtopic) on delete cascade;

alter table likecom add constraint likecomutilisateur foreign key(mailLike) references utilisateur(mail) on delete cascade,
add constraint likecomcommentaire foreign key(idcom) references commentaire(idcom) on delete cascade;