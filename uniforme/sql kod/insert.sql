
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
                   (NULL,'Muska bluza nitna',8,1,5999,NULL,NULL,NULL,NULL,1,1,1,1,'Muska bluza na kopcanje sa dikerima i 3 dzepa. Sastav 35% pamuk, 65%poliester.'),
                   (NULL,'Muska hirurska bluza1',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza2',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza3',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza4',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska hirurska bluza5',8,1,5999,NULL,NULL,1,1,1,1,1,1,'Muska hirurska bluza na V sa 3 dzepa. Sastav 35%pamuk, 65%poliester'),
                   (NULL,'Muska bluza SUPERSTRETCH1',8,1,5999,1,1,1,1,1,1,NULL,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH2',8,1,5999,1,1,NULL,NULL,1,NULL,1,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH3',8,1,5999,1,1,1,1,1,1,NULL,NULL,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH4',8,1,5999,NULL,1,NULL,NULL,1,1,1,1,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muska bluza SUPERSTRETCH5',8,1,5999,1,1,1,1,1,1,NULL,NULL,'Lagana bluza koja pruza neverovatan osecaj lakoce i udobnosti. Sastav bluze: 60%pamuk, 35%poliester i 5%elastin'),
                   (NULL,'Muske pantalone1',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester'),
                   (NULL,'Muske pantalone2',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester'),
                   (NULL,'Muske pantalone3',9,1,5999,NULL,NULL,1,1,1,1,1,1,'Produzeni model pantalone sa lastizom, sa 2 dzepa. Sastav 35%pamuk i 65%poliester');

INSERT INTO slika(`put`,`artikal_id`) VALUES
                 ("artikli/Muska bluza nitna.jpg", 1),
                 ("artikli/Muska hirurska bluza1.jpg", 2),
                 ("artikli/Muska hirurska bluza2.jpg", 3),
                 ("artikli/Muska hirurska bluza3.jpg", 4),
                 ("artikli/Muska hirurska bluza4.jpg", 5),
                 ("artikli/Muska hirurska bluza5.jpg", 6),
                 ("artikli/Muska bluza SUPERSTRETCH1.jpg", 7),
                 ("artikli/Muska bluza SUPERSTRETCH2.jpg", 8),
                 ("artikli/Muska bluza SUPERSTRETCH3.jpg", 9),
                 ("artikli/Muska bluza SUPERSTRETCH4.jpg", 10),
                 ("artikli/Muska bluza SUPERSTRETCH5.jpg", 11),
                 ("artikli/Muske pantalone1.jpg", 12),
                 ("artikli/Muske pantalone2.jpg", 13),
                 ("artikli/Muske pantalone3.jpg", 14);





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

        