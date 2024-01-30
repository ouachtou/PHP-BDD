CREATE TABLE `Users` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `adress` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `admin` boolean NOT NULL
);

CREATE TABLE `Products` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `price` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `reduction` int(11) NOT NULL
);

CREATE TABLE `Orders`(
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `id_user` INT(11) NOT NULL,
    `status` varchar(255) NOT NULL,
    `updated_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
    `created_at` int(11) NOT NULL DEFAULT current_timestamp()
);
ALTER TABLE Orders
    ADD CONSTRAINT `name`
    FOREIGN KEY (`id_user`)
    REFERENCES Users (`id`)
    ON DELETE CASCADE;