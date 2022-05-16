ALTER TABLE `table_name` AUTO_INCREMENT=1

INSERT INTO `user`(`pseudo`,`password`,`nom`,`prenom`,`email`)
    VALUES  ('admin','Passw0rd!','','','admin@superanimes.com'),
            ('jon','sup3rp@ssword','MAROTTA','Jonathan','marotta.jonathan@superanimes.com'),
            ('sann','MyPa$$word1','NGUYEN','Bernard','nguyen.bernard@superanimes.com'),
            ('DummyOne','azerty_1','Dummy','One','init.users@superanimes.com'),
            ('DummyTwo','azerty_1','Dummy','Two','init.users@superanimes.com'),
            ('DummyThree','azerty_1','DumDum','Trois','init.users@superanimes.com'),
            ('DummyFour','azerty_1','StupidDummy','4','init.users@superanimes.com'),
            ('DummyFive','azerty_1','no','brain','init.users@superanimes.com'),
            ('DummySix','azerty_1','Six','','init.users@superanimes.com'),
            ('DummySeven','azerty_1','','Seven','init.users@superanimes.com'),
            ('DummyEight','azerty_1','','','init.users@superanimes.com'),
            ('DummyNine','azerty_1','','','init.users@superanimes.com'),
            ('DummyTen','azerty_1','','','init.users@superanimes.com'),


INSERT INTO `animes` (`id_anime`, `titre_native`, `titre_romaji`, `titre_fr`, `status`, `studio`, `genre`, `synopsis`, `nb_episodes`, `note`) VALUES
(1, '進撃の巨人', 'Shingeki no Kyojin', "L'Attaque des Titans", 1 , 'Wit Studio', 'Action, Drama, Fantasy, Mystery', "Dans un monde ravagé par des titans mangeurs d’homme depuis plus d’un siècle, les rares survivants de l’Humanité n’ont d’autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu’un rêve : entrer dans le corps d’élite chargé de découvrir l’origine des titans, et les annihiler jusqu’au dernier…", 25, 0),
(2, '進撃の巨人 2', 'Shingeki no Kyojin 2', "L'Attaque des Titans S2", 1 , 'Wit Studio', 'Action, Drama, Fantasy, Mystery', "Saison 2 de Shingeki no Kyojin<br>Suite aux événements impliquant Annie et Eren, tous les membres de leur promotion sont suspectés de pouvoir se transformer en Titan et sont isolés. Mais, pendant l’enquête, une nouvelle terrifiante parvient à la capitale : le mur de Rose serait fracturé.", 12, 0),
(2, '進撃の巨人 3', 'Shingeki no Kyojin 3', "L'Attaque des Titans S3", 1 , 'Wit Studio', 'Action, Drama, Fantasy, Mystery', "Saison 3 de Shingeki no Kyojin<br>Le bataillon a réussi à récupérer Eren, mais le titan colossal et le titan cuirassé sont parvenus à leur échapper. De plus, les pertes sont colossales et Erwin doit faire face à de nouvelles accusations.", 22, 0),
(2, '進撃の巨人 The Final Season', 'Shingeki no Kyojin The Final Season', "L'Attaque des Titans S4", 1 , 'Wit Studio', 'Action, Drama, Fantasy, Mystery', "Saison 4 de Shingeki no Kyojin", 28, 0);