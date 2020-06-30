use client_service_control

/*****************TABLAS*********************/
CREATE TABLE user (
  id INT NOT NULL PRIMARY KEY,
  id_user VARCHAR(9) NOT NULL,
  name VARCHAR(45) NULL,
  user_type CHAR(2) NULL
  );
  
ALTER TABLE user
ADD CONSTRAINT CHK_userType CHECK (user_type='CO' OR user_type='CA' OR user_type='AD');

ALTER TABLE user
ADD COLUMN email VARCHAR(45) NULL AFTER user_type;

CREATE TABLE service (
  id_service INT NOT NULL,
  date_of_pucharse DATE NOT NULL,
  date_of_expiration DATE NULL,
  type_service CHAR(2) NULL,
  PRIMARY KEY (id_service));

ALTER TABLE service
ADD CONSTRAINT CHK_serviceType CHECK (type_service='DO' OR type_service='HO' OR type_service='EM' OR type_service='MA');

CREATE TABLE company (
  id_company INT NOT NULL,
  name VARCHAR(45) NULL,
  id_user INT NULL,
  id_service INT NULL,
  PRIMARY KEY (id_company));

ALTER TABLE company
ADD FOREIGN KEY (id_user) REFERENCES user(id);

ALTER TABLE company
ADD FOREIGN KEY (id_service) REFERENCES service(id_service);

/*****************PROCEDIMIENTOS*********************/
DELIMITER $$
CREATE PROCEDURE sp_expiration_date()
BEGIN
SELECT c.name, s.type_service, s.date_of_expiration FROM Company c, Service s
	WHERE c.id_service = s.id_service AND s.date_of_expiration < CURDATE();
END$$


DELIMITER $$
CREATE PROCEDURE sp_expiring_services()
BEGIN
SELECT c.name, s.type_service, s.date_of_expiration FROM Company c, Service s
	WHERE c.id_service = s.id_service AND s.date_of_expiration >= CURDATE();
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE notify ()
BEGIN
SELECT c.name, s.type_service, s.date_of_expiration, u.email FROM Company c, Service s, user u
	WHERE c.id_service = s.id_service
    AND c.id_user = u.id
    AND s.date_of_expiration = CURDATE();
END$$
DELIMITER ;

DELIMITER $$

CREATE PROCEDURE notify()
BEGIN
SELECT c.name, s.type_service, s.date_of_expiration, u.email FROM Company c, Service s, user u
	WHERE c.id_service = s.id_service
    AND c.id_user = u.id
    AND s.date_of_expiration = CURDATE();
END$$
DELIMITER ;

INSERT INTO `client_service_control`.`user`
(`id`,
`id_user`,
`name`,
`user_type`,
`email`)
VALUES
(3,
305980356,
'Esteisy Ruiz Monge',
'AD',
'keirm02@gmail.com');

INSERT INTO `client_service_control`.`service`
(`id_service`,
`date_of_pucharse`,
`date_of_expiration`,
`type_service`)
VALUES
(4,
'2020-5-29',
'2020-6-29',
'MA');

INSERT INTO `client_service_control`.`company`
(`id_company`,
`name`,
`id_user`,
`id_service`)
VALUES
(4,
'TecCompany4',
2,
4);



 