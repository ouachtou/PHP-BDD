CREATE TABLE `Users` (
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`          varchar(255) NOT NULL,
    `first_name`    varchar(255) NOT NULL,
    `adress`        varchar(255) NOT NULL,
    `password`      varchar(255) NOT NULL,
    `email`         varchar(255) NOT NULL,
    `created_at`    datetime NOT NULL DEFAULT current_timestamp(),
    `admin`         boolean DEFAULT FALSE
)
ENGINE = INNODB
CHARACTER SET 'utf8';



CREATE TABLE `Products` (
    `id`            INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`          varchar(255) NOT NULL,
    `type`          varchar(255) NOT NULL,
    `price`         int(11) NOT NULL,
    `quantity`      int(11) NOT NULL,
    `reduction`     int(11) NOT NULL
)
ENGINE = INNODB
CHARACTER SET 'utf8';




CREATE TABLE `Orders`(
    `id`            int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user`       int(11) NOT NULL,
    `status`        varchar(255) NOT NULL,
    `updated_at`    datetime NOT NULL DEFAULT current_timestamp(),
    `created_at`    datetime NOT NULL DEFAULT current_timestamp(),

    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';



CREATE TABLE `Avis`(
    `id`            int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user`       int(11) NOT NULL,
    `id_product`    int(11) NOT NULL,
    `comment`       varchar(255) NOT NULL,
    `note`          float(1) NOT NULL,
    `uploaded_at`   datetime NOT NULL DEFAULT current_timestamp(),

    FOREIGN KEY (`id_user`) REFERENCES Users (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';



CREATE TABLE `Link`(
    `id`            int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_order`      int(11) NOT NULL,
    `id_product`    int(11) NOT NULL,

    FOREIGN KEY (`id_order`) REFERENCES Orders (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_product`) REFERENCES Products (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = INNODB
CHARACTER SET 'utf8';