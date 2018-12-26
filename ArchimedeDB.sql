
USE darossi;
/*
DROP DATABASE IF EXISTS Archimede;
CREATE DATABASE Archimede;
*/
SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS type_account;
CREATE TABLE type_account(
	user_type varchar(64) NOT NULL,
	link varchar(64) NOT NULL,
	home boolean DEFAULT '0',
	PRIMARY KEY(user_type,link)
);

DROP TABLE IF EXISTS account;
CREATE TABLE account(
	username varchar(64),
	type char(64) NOT NULL,
	password varchar(64) NOT NULL,
	PRIMARY KEY (username),
	FOREIGN KEY (type) REFERENCES type_account(user_type)
);

DROP TABLE IF EXISTS orario;
CREATE TABLE orario(
	username varchar(64) PRIMARY KEY,
	lunedi varchar(64) NOT NULL,
	martedi varchar(64) NOT NULL,
	mercoledi varchar(64) NOT NULL,
	giovedi varchar(64) NOT NULL,
	venerdi varchar(64) NOT NULL,
	sabato varchar(64) NOT NULL,
	domenica varchar(64) NOT NULL,
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS logo;
CREATE TABLE logo(
	username varchar(64) PRIMARY KEY,
	logo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS info;
CREATE TABLE info(
	username varchar(64) PRIMARY KEY,
	negozio varchar(64) NOT NULL,
	telefono varchar(13) NOT NULL,
	mail varchar(64),
	sito varchar(96),
	motto varchar(64),
	descrizione varchar(256),
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS immagini;
CREATE TABLE immagini(
	username varchar(64) NOT NULL,
	type ENUM('promozione','prodotto') NOT NULL,
	ID int NOT NULL AUTO_INCREMENT,
	source varchar(64) NOT NULL ,
	titolo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	start varchar(64) NOT NULL,
	finish varchar(64) NOT NULL,
	descrizione varchar(256) NOT NULL,
	data_inserimento date NOT NULL,
    PRIMARY KEY (ID),
	FOREIGN KEY (username) REFERENCES account(username),
	CONSTRAINT AK_Titolo UNIQUE(titolo),
	CONSTRAINT AK_source UNIQUE(source),
	FOREIGN KEY (username) REFERENCES account(username)

);

DROP TABLE IF EXISTS eventi;
CREATE TABLE eventi(
	ID int NOT NULL AUTO_INCREMENT,
	type ENUM('APERTURA','CHIUSURA','NOVITA') NOT NULL,
	data date NOT NULL,
	descrizione varchar(64),
	PRIMARY KEY(ID) 
);


DROP TABLE IF EXISTS onlineUser;
CREATE TABLE onlineUser(
	account varchar(64) NOT NULL,
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	temporaryKey varchar(64),
	PRIMARY KEY(account),
	FOREIGN KEY (account) REFERENCES account(username)
);


SET FOREIGN_KEY_CHECKS=1;


DELIMITER $$
CREATE TRIGGER EliminaUtente BEFORE DELETE ON account FOR EACH ROW 
BEGIN
	DELETE FROM info WHERE username =OLD.username;
	DELETE FROM orario WHERE username =OLD.username;
	DELETE FROM logo WHERE username =OLD.username;
	DELETE FROM immagini WHERE username =OLD.username;
	DELETE FROM onlineUser WHERE account =OLD.username;

END
$$ DELIMITER ;

DELIMITER $$
CREATE TRIGGER NuovoUtente AFTER INSERT ON account FOR EACH ROW BEGIN
	INSERT INTO info values (NEW.username,NEW.username,'+390498271200','info@centro.archimede.it','tecweb1617.studenti.math.unipd.it/
darossi/mainPage/HTML/index.php','Abbiamo appena aperto!',"Presto l'apertura del nuovo negozio, che aspetti corri a trovarci il prima possibile");
	INSERT INTO orario values (NEW.username,'08:30-21:30','08:30-21:30','08:30-21:30','08:30-21:30','08:30-21:30','08:30-21:30','08:30-21:30');
	INSERT INTO logo values (NEW.username,'working_progress.jpg','logo negozio');
END
$$ DELIMITER ;


DELIMITER $$

CREATE EVENT inactiveUser
    ON SCHEDULE
      EVERY 15 MINUTE
    COMMENT 'Delete accounts inactive in the last 15 minutes'
    DO
      BEGIN
		DELETE FROM onlineUser WHERE data < (NOW() - INTERVAL 15 MINUTE);
      END

$$ DELIMITER ;


INSERT INTO type_account VALUES ('admin', 'general_admin','1');
INSERT INTO type_account VALUES ('admin', 'eventi_private','0');
INSERT INTO type_account VALUES ('user', 'general_private','1');
INSERT INTO type_account VALUES ('user', 'promozioni_private','0');
INSERT INTO type_account VALUES ('user', 'prodotti_private','0');
INSERT INTO type_account VALUES ('admin', 'login','0');
INSERT INTO type_account VALUES ('user', 'login','0');
INSERT INTO type_account VALUES ('unlogged', 'login','1');



INSERT INTO account VALUES ('admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
