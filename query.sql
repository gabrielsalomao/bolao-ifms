create or replace table time
(
    id     int auto_increment
        primary key,
    nome   varchar(500)  not null,
    imagem varchar(1000) not null
);

create or replace table jogo
(
    id           int auto_increment
        primary key,
    time1_id     int           null,
    time2_id     int           null,
    data_hora    datetime      null,
    time1_placar int default 0 null,
    time2_placar int default 0 null,
    constraint jogo_time_id_fk
        foreign key (time1_id) references time (id)
            on update cascade on delete cascade,
    constraint jogo_time_id_fk_2
        foreign key (time2_id) references time (id)
            on update cascade on delete cascade
);

create or replace table usuario
(
    id            int auto_increment
        primary key,
    nome_completo varchar(500) not null,
    login         varchar(500) not null,
    senha         varchar(500) not null,
    admin         tinyint(1)   not null
);

create or replace table palpite
(
    id           int auto_increment
        primary key,
    time1_placar int default 0 not null,
    time2_placar int default 0 not null,
    usuario_id   int           not null,
    jogo_id      int           not null,
    constraint palpite_jogo_id_fk
        foreign key (jogo_id) references jogo (id)
            on update cascade on delete cascade,
    constraint palpite_usuario_id_fk
        foreign key (usuario_id) references usuario (id)
            on update cascade on delete cascade
);

insert into time (id, nome, imagem)
values  (3, 'Brasil', '556ca2dc62c6d3f21f380702b1e58d90fb28b893.png'),
        (5, 'Argentina', '6e627031704acb10a111d188322399baf4c2784b.png'),
        (6, 'Holanda', '0c8d9e1eb6ddfe47c70834a49cfb93ee73a9186f.png'),
        (7, 'Portugal', 'd5638ed50d34b8ed575cdc73560f68f398431467.png'),
        (8, 'Marrocos', '2c1a796b3d4d6446ac03242450d10ce87ea61c3a.png'),
        (10, 'Croácia', '73d18729ff4eedef487b1c0d9cb2a4b8f00af633.png');

insert into jogo (id, time1_id, time2_id, data_hora, time1_placar, time2_placar)
values  (5, null, null, '0000-00-00 00:00:00', 0, 0),
        (6, 10, 3, '2022-12-09 11:00:00', 0, 0),
        (7, 6, 5, '2022-12-10 15:00:00', 0, 0);

insert into usuario (id, nome_completo, login, senha, admin)
values  (1, 'Gabriel Morais', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
        (21, 'Gabriel Salomão', 'admin2', '25d55ad283aa400af464c76d713c07ad', 0),
        (22, 'Elza Flávia', 'teste1', 'e10adc3949ba59abbe56e057f20f883e', 0);

insert into palpite (id, time1_placar, time2_placar, usuario_id, jogo_id)
values  (2, 0, 0, 1, 6),
        (3, 1, 2, 22, 6),
        (4, 3, 2, 1, 7),
        (5, 1, 1, 22, 7);