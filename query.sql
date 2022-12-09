create table time
(
    id          int auto_increment
        primary key,
    nome        varchar(500)  not null,
    fotoCaminho varchar(1000) not null,
    fotoUrl     varchar(1000) not null,
    usarFotoUrl tinyint(1)    not null
);

create table usuario
(
    id            int auto_increment
        primary key,
    nome_completo varchar(500) not null,
    login         varchar(500) not null,
    senha         varchar(500) not null,
    admin         tinyint(1)   not null
);

INSERT INTO `bolao-ifms-db`.usuario (id, nome_completo, login, senha, admin) VALUES (1, 'Gabriel Morais', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);
