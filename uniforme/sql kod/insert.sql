USE uniforme;
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
                 ("majice"),
                 ("bluzeM"),
                 ("pantaloneM"),
                 ("mantilM");


INSERT INTO velicine(`size`) VALUES
                    ('2XS'),
                    ('XS'),
                    ('S'),
                    ('M'),
                    ('L'),
                    ('XL'),
                    ('2XL'),
                    ('3XL');

INSERT INTO artikal(`sifra`,`naziv`,`vrsta_id`,`pol_id`,`cena`,`2XS`,`XS`,`S`,`M`,`L`,`XL`,`2XL`, `3XL`,`opis`) VALUES
                   (NULL,'Muska bluza nitna1',8,1,5999,NULL,NULL,NULL,NULL,1,1,1,1,'Muska bluza na kopcanje sa dikerima i 3 dzepa. Sastav 35% pamuk, 65%poliester.'),
                   (NULL,'Muska hirurska bluza01',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza02',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza03',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza04',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza05',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska bluza SUPERSTRETCH01',8,1,5999,1,1,1,1,1,1,NULL,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH02',8,1,5999,1,1,NULL,NULL,1,NULL,1,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH03',8,1,5999,1,1,1,1,1,1,NULL,NULL,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH04',8,1,5999,NULL,1,NULL,NULL,1,1,1,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH05',8,1,5999,1,1,1,1,1,1,NULL,NULL,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muske pantalone01',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester'),
                   (NULL,'Muske pantalone02',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester'),
                   (NULL,'Muske pantalone03',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester');

INSERT INTO slika(`put`,`artikal_id`) VALUES
                 ("artikli/Muska bluza nitna1.jpg", 1),
                 ("artikli/Muska hirurska bluza01.jpg", 2),
                 ("artikli/Muska hirurska bluza02.jpg", 3),
                 ("artikli/Muska hirurska bluza03.jpg", 4),
                 ("artikli/Muska hirurska bluza04.jpg", 5),
                 ("artikli/Muska hirurska bluza05.jpg", 6),
                 ("artikli/Muska bluza SUPERSTRETCH01.jpg", 7),
                 ("artikli/Muska bluza SUPERSTRETCH02.jpg", 8),
                 ("artikli/Muska bluza SUPERSTRETCH03.jpg", 9),
                 ("artikli/Muska bluza SUPERSTRETCH04.jpg", 10),
                 ("artikli/Muska bluza SUPERSTRETCH05.jpg", 11),
                 ("artikli/Muske pantalone01.jpg", 12),
                 ("artikli/Muske pantalone02.jpg", 13),
                 ("artikli/Muske pantalone03.jpg", 14);





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

        