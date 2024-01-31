CREATE TABLE IF NOT EXISTS `Users` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_order` INT(11) DEFAULT NULL,
    `name` VARCHAR(255) DEFAULT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `adress` VARCHAR(255) DEFAULT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT current_timestamp(),
    `admin` BOOLEAN DEFAULT FALSE,
    `phone_number` VARCHAR(11) DEFAULT NULL
) ENGINE = INNODB CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS `Products` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `price` FLOAT(24) NOT NULL,
    `quantity` INT(11) NOT NULL,
    `reduction` INT(11) NOT NULL DEFAULT 0,
    `image` VARCHAR(255) DEFAULT NULL
) ENGINE = INNODB CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS `Orders`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` INT(11) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `updated_at` DATETIME NOT NULL DEFAULT current_timestamp(),
    `created_at` DATETIME NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS `Feedbacks`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` INT(11) NOT NULL,
    `id_product` INT(11) NOT NULL,
    `comment` VARCHAR(255) NOT NULL,
    `note` INT(1) NOT NULL,
    `uploaded_at` DATETIME NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS `Links`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_order` INT(11) NOT NULL,
    `id_product` INT(11) NOT NULL,
    FOREIGN KEY (`id_order`) REFERENCES Orders (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB CHARACTER SET 'utf8';

ALTER TABLE
    `Users`
ADD
    FOREIGN KEY (`id_order`) REFERENCES Orders (`id`) ON DELETE CASCADE ON UPDATE CASCADE;