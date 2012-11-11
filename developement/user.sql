CREATE USER 'cas-stage'@'localhost' IDENTIFIED BY 'c4557463';
GRANT SELECT, INSERT, UPDATE, DELETE ON `cas-stage`.*
TO 'cas-stage'@'localhost';
FLUSH PRIVILEGES;