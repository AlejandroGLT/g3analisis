CREATE TABLE tbl_users(
id_user INT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(30) NOT NULL,
email VARCHAR(30),
password_user VARCHAR(30),
status_user ENUM('active', 'inactive'),
id_role INT UNSIGNED,
id_positions INT UNSIGNED,
PRIMARY KEY(id_user),
FOREIGN KEY(id_role) REFERENCES tbl_role (id_role),
FOREIGN KEY(id_positions) REFERENCES tbl_positions (id_positions)
);

CREATE TABLE tbl_role (
id_role INT UNSIGNED NOT NULL AUTO_INCREMENT,
name_role VARCHAR(50) NOT NULL,
status_role ENUM('active', 'inactive') NOT NULL,
PRIMARY KEY (id_role)
);

CREATE TABLE tbl_positions (
id_positions INT UNSIGNED NOT NULL AUTO_INCREMENT,
positions_user VARCHAR(50) NOT NULL,
email VARCHAR(30),
positions_name VARCHAR(40),
positions_password VARCHAR(30),
status_positions ENUM('active', 'inactive') NOT NULL,
id_role INT UNSIGNED,
PRIMARY KEY (id_positions),
FOREIGN KEY(id_role) REFERENCES tbl_role(id_role) 
);
