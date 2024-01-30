CREATE TABLE `Users` (
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(255) NOT NULL,
    `first_name`    VARCHAR(255) NOT NULL,
    `adress`        VARCHAR(255) NOT NULL,
    `password`      VARCHAR(255) NOT NULL,
    `email`         VARCHAR(255) NOT NULL,
    `created_at`    DATETIME NOT NULL DEFAULT current_timestamp(),
    `admin`         BOOLEAN DEFAULT FALSE
)
ENGINE = INNODB
CHARACTER SET 'utf8';


CREATE TABLE `Products` (
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(255) NOT NULL,
    `type`          VARCHAR(255) NOT NULL,
    `price`         FLOAT(24) NOT NULL,
    `quantity`      INT(11) NOT NULL,
    `reduction`     INT(11) NOT NULL
)
ENGINE = INNODB
CHARACTER SET 'utf8';



CREATE TABLE `Orders`(
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user`       INT(11) NOT NULL,
    `status`        VARCHAR(255) NOT NULL,
    `updated_at`    DATETIME NOT NULL DEFAULT current_timestamp(),
    `created_at`    DATETIME NOT NULL DEFAULT current_timestamp(),

    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';


CREATE TABLE `Feedbacks`(
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user`       INT(11) NOT NULL,
    `id_product`    INT(11) NOT NULL,
    `comment`       VARCHAR(255) NOT NULL,
    `note`          INT(1) NOT NULL,
    `uploaded_at`   DATETIME NOT NULL DEFAULT current_timestamp(),

    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';


CREATE TABLE `Links`(
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_order`      INT(11) NOT NULL,
    `id_product`    INT(11) NOT NULL,

    FOREIGN KEY (`id_order`) REFERENCES Orders (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';