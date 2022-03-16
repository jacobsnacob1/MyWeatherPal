CREATE DATABASE mwp_1;

USE mwp_1;

CREATE TABLE person (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR (50),
	lastName VARCHAR (50),
	emailAddress VARCHAR (50) NOT NULL,
	phoneNumber VARCHAR (10),
    phoneCarrier VARCHAR (50),
	upgradeTier VARCHAR (50),
	createDateTime DATETIME DEFAULT (current_timestamp),
    modDateTime DATETIME ON UPDATE NOW()
	);
	
CREATE TABLE settings (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userId INTEGER NOT NULL,
	defaultZipCode VARCHAR (5),
    defaultChannel VARCHAR (50) DEFAULT ('WeatherAPI'),
	tempUoM CHAR (1),
    timeFmt VARCHAR (2) DEFAULT ('12'),
    save_1_zip VARCHAR (5),
    save_2_zip VARCHAR (5),
    save_3_zip VARCHAR (5),
    save_4_zip VARCHAR (5),
    save_5_zip VARCHAR (5),
    createDateTime DATETIME DEFAULT (current_timestamp),
    modDateTime DATETIME ON UPDATE NOW()
	CONSTRAINT fk_settings_userId FOREIGN KEY (userId) REFERENCES person(id)
	);

CREATE TABLE passwords (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userId INTEGER NOT NULL,
	active BOOLEAN NOT NULL,
    createDateTime DATETIME DEFAULT (current_timestamp),
    modDateTime DATETIME ON UPDATE NOW(),
	password VARCHAR (100) NOT NULL,
	CONSTRAINT fk_password_userId FOREIGN KEY (userId) REFERENCES person(id)
	);
	
CREATE TABLE billing_address (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userId INTEGER NOT NULL,
	billStreet VARCHAR (50),
	billCity VARCHAR (50),
	billState CHAR(2),
	billZipCode VARCHAR (5),
    createDateTime DATETIME DEFAULT (current_timestamp),
    modDateTime DATETIME ON UPDATE NOW(),
	CONSTRAINT fk_billing_userId FOREIGN KEY (userId) REFERENCES person(id)
	);

CREATE TABLE notification_category (
	notificationName VARCHAR (50) NOT NULL PRIMARY KEY,
	category VARCHAR (50) NOT NULL,
    friendlyName VARCHAR (50) NOT NULL,
    description VARCHAR (100) NOT NULL,
    frequency VARCHAR (50) NOT NULL
	);

CREATE TABLE notification (
	id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userId INTEGER NOT NULL,
	name VARCHAR (50) NOT NULL,
	medium VARCHAR (50) NOT NULL,
    nft_value VARCHAR (50),
	active BOOLEAN NOT NULL,
    createDateTime DATETIME DEFAULT (current_timestamp),
    modDateTime DATETIME ON UPDATE NOW(),
	CONSTRAINT fk_notification_userId FOREIGN KEY (userId) REFERENCES person(id),
	CONSTRAINT fk_notification_name FOREIGN KEY (name) REFERENCES notification_category(notificationName)
	);
    
CREATE TABLE zip_code (
    zipCode VARCHAR (5) NOT NULL PRIMARY KEY,
   	latitude VARCHAR (50) NOT NULL,
	longitude VARCHAR (50) NOT NULL,
    cityName VARCHAR (50) NOT NULL,
    stateAbbr VARCHAR (2) NOT NULL,
    stateName VARCHAR (50) NOT NULL
   	);
    