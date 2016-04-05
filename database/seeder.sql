USE lit_db;

TRUNCATE lit;

INSERT INTO lit (label, lang_origin, lang_trans, description, img_file, type_id, luis_score)
VALUES 
('crab', 4 , 1 ,'fresh crap', '/img/1.jpeg',2,1), 
('soup', 4 , 1 ,'soup for sluts', '/img/2.jpeg',2,2), 
('fire extinguisher', 4 , 1 ,'hand grenade', '/img/3.jpeg',2,2), 
('road construction', 3 , 1 ,'road surprise', '/img/4.jpeg',2,1), 
('awesomeness', 1 , 1 ,'not so awesome', '/img/5.jpeg',1,1), 
('Coors', 2 , 1 ,'suffer from diarrhea', '/img/6.jpeg',2,2),
('cray tatoo', 3 , 1 ,'Babylon dictionary translation', '/img/7.jpeg',1,1);
