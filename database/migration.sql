USE lit_db;

SET foreign_key_checks = 0;

-- table of types of translations, foreign key on lit
DROP TABLE IF EXISTS type;

CREATE TABLE type (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    typet VARCHAR(5) NOT NULL, 
    PRIMARY KEY (id)
);

TRUNCATE type;
INSERT INTO type (typet) VALUES ('sign'),('eat'),('movie');



-- table of languages, foreign key on lit used twice
DROP TABLE IF EXISTS lang;

CREATE TABLE lang (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    lang VARCHAR(10) NOT NULL, 
    PRIMARY KEY (id)
);

TRUNCATE type;
INSERT INTO lang (lang) VALUES ('English'),('Spanish'),('Korean'),('Arabic'),('German'),('French');



-- table of translation entries
DROP TABLE IF EXISTS lit;

CREATE TABLE lit (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    label VARCHAR(15) NOT NULL, 
    lang_origin INT UNSIGNED DEFAULT NULL, 
    lang_trans INT UNSIGNED DEFAULT NULL,
    phrase  VARCHAR(200) NOT NULL,
    img VARCHAR(200) DEFAULT 'NONE',
    type_id INT UNSIGNED DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (type_id) REFERENCES type (id),
    FOREIGN KEY (lang_origin) REFERENCES lang (id),
    FOREIGN KEY (lang_trans) REFERENCES lang (id)
);

SET foreign_key_checks = 1;
