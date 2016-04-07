USE lit_db;


-- table of types of translations, foreign key on lit
DROP TABLE IF EXISTS lit;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS img_file;
DROP TABLE IF EXISTS luis;
DROP TABLE IF EXISTS lang;
DROP TABLE IF EXISTS typet;


CREATE TABLE typet (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    typet VARCHAR(10) NOT NULL, 
    PRIMARY KEY (id)
);

TRUNCATE typet;
INSERT INTO typet (typet) VALUES ('tattoo'),('sign');



-- table of languages, foreign key on lit used twice
CREATE TABLE lang (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    lang VARCHAR(20) NOT NULL, 
    PRIMARY KEY (id)
);

TRUNCATE lang;
INSERT INTO lang (lang) VALUES ('English'),('Spanish'),('Hebrew'),('Chinese Characters'),('Arabic');


-- give each item a luis score
CREATE TABLE luis (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    score VARCHAR(20) NOT NULL, 
    img_file VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

TRUNCATE luis;
INSERT INTO luis (score, img_file) VALUES ('meh', '2.png'),('facepalm', '5.p ng');


-- table of users and passwords
CREATE TABLE user (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    password VARCHAR(10) NOT NULL, 
    PRIMARY KEY (id)
);

TRUNCATE user;
INSERT INTO user (username, password) VALUES ('admin','admin');



-- table of translation entries
CREATE TABLE lit (

    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    label VARCHAR(100) NOT NULL, 
    lang_origin INT UNSIGNED DEFAULT NULL, 
    lang_trans INT UNSIGNED DEFAULT NULL,
    description  VARCHAR(1000) NOT NULL,
    img_file VARCHAR(100) NULL,
    type_id INT UNSIGNED DEFAULT NULL,
    luis_score INT UNSIGNED DEFAULT NULL,
    user_edit INT UNSIGNED DEFAULT 1,
    PRIMARY KEY (id),
    CONSTRAINT img_file UNIQUE (img_file),
    FOREIGN KEY (type_id) REFERENCES typet (id),
    FOREIGN KEY (lang_origin) REFERENCES lang (id),
    FOREIGN KEY (lang_trans) REFERENCES lang (id),
    FOREIGN KEY (luis_score) REFERENCES luis (id),
    FOREIGN KEY (user_edit) REFERENCES user (id)
);

