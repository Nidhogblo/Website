CREATE DATABASE KUESKI2;

USE KUESKI2;

CREATE TABLE `USERS`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`Identity_user_id` INT NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`first_last_name` VARCHAR(50) NOT NULL,
	`born_date` DATETIME NOT NULL,
	`nationality` VARCHAR(50) NOT NULL,
	`state_of_birth` VARCHAR(50) NOT NULL,
	`economic_activity` VARCHAR(50) NOT NULL,
	`curp` VARCHAR(50) NOT NULL,
	`gender` VARCHAR(10) NOT NULL,
	`phone_number` INT NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`user_data` VARCHAR(255),
	`is_client` TINYINT(1) NOT NULL,
	`is_blocked` TINYINT(1) NOT NULL,
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`deleted_at` DATETIME DEFAULT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `IDENTIFICATION`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`identification_type` VARCHAR(50) NOT NULL,
	`identification_number` INT NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT `fk_Identifications_Users` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT `uq_Identifications_user_id` UNIQUE (`user_id`)
);

CREATE TABLE `ADDRESSES` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `country` VARCHAR(50) NOT NULL,
    `state` VARCHAR(50) NOT NULL,
    `city` VARCHAR(50) NOT NULL,
    `neighborhood` VARCHAR(50) NOT NULL,
    `zip_code` INT NOT NULL,
    `street` VARCHAR(50) NOT NULL,
    `ext_number` INT NOT NULL,
    `int_number` INT,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_Addresses_Users` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `uq_Addresses_user_id` UNIQUE (`user_id`)
);

CREATE TABLE `REQUESTS` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `comment` VARCHAR(255),
    `date_request` DATETIME NOT NULL,
    `is_acces` BOOLEAN NOT NULL,
    `is_rect` BOOLEAN NOT NULL,
    `is_cancel` BOOLEAN NOT NULL,
    `is_opp` BOOLEAN NOT NULL,
    `realized` BOOLEAN NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_Requests_Users` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

	

