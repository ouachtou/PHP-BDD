CREATE TABLE `Users` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `adress` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `admin` boolean DEFAULT
);

CREATE TABLE 'Products' (
    `id_product` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `price` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `reduction` int(11) NOT NULL,
);

CREATE TABLE 'Orders'(
)