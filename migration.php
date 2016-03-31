<?php 

DROP TABLE IF EXISTS lit;

CREATE TABLE lit (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    lang_origin VARCHAR(50) NOT NULL, 
    lang_trans  VARCHAR(50) NOT NULL,
    phrase  VARCHAR(200) NOT NULL,
    img VARCHAR(200) DEFAULT 'NONE',
    PRIMARY KEY (id)
);