
INSERT INTO pol(naziv) VALUES
                ("musko"),
                ("zensko"),
                ("uniseks");

INSERT INTO vrsta(naziv) VALUES
                 ("bluze"),
                 ("pantalone"),
                 ("mantil"),
                 ("haljine"),
                 ("suknje"),
                 ("kape"),
                 ("majice");

INSERT INTO velicine(`size`) VALUES
                    ('XXS'),
                    ('XS'),
                    ('S'),
                    ('M'),
                    ('L'),
                    ('XL'),
                    ('XXL');

INSERT INTO artikal(`sifra`,`naziv`,`opis`,`vrsta_id`,`pol_id`,`cena`,`XXS`,`XS`,`S`,`M`,`L`,`XL`,`XXL`) VALUES
                   (10000,'Muska bluza',NULL,1,1,5999,NULL,NULL,1,1,1,NULL,NULL),
                   (10000,'Muska bluza2',NULL,1,1,5999,NULL,1,NULL,NULL,NULL,1,NULL),
                   (10000,'Zenksa bluza',NULL,1,2,5999,NULL,NULL,1,1,NULL,1,NULL),
                   (10000,'zenska bluza2',NULL,1,2,5999,NULL,NULL,NULL,1,NULL,NULL,1),
                   (10000,'Muske pantalone',NULL,2,1,5999,NULL,1,NULL,1,NULL,NULL,NULL),
                   (10000,'Zenske pantalone',NULL,2,2,5999,NULL,1,1,NULL,1,NULL,NULL);

INSERT INTO slika(`put`,`artikal_id`) VALUES
                 ("artikli/artikalM1.jpg", 1),
                 ("artikli/artikalM2.jpg", 2),
                 ("artikli/artikal1.jpg", 3),
                 ("artikli/artikal2.jpg", 4),
                 ("artikli/artikalM3.jpg", 5),
                 ("artikli/artikal3.jpg", 6);




-- INSERT INTO dostupne_velicine (`artikal_id`,`velicine_id`)
-- VALUES  (1,'M'),
--         (1,'L'),
--         (1,'XL'),
--         (2,'S'),
--         (2,'M'),
--         (3,'XXL'),
--         (4,'XL'),
--         (5,'M'),
--         (6,'S'),
--         (6,'L'),
--         (2,'S');

        