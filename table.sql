CREATE TABLE `users` (
    `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nom` varchar(255) NOT NULL,
    `prénom` varchar(255) NOT NULL,
    `adresse` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `num` int(11) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    `Admin` boolean DEFAULT,
);

CREATE TABLE 'Produit' (
    `id-produit` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `nom` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `prix` int(11) NOT NULL,
    `quantités` int(11) NOT NULL,
    `réduction` int(11) NOT NULL,
);

CREATE TABLE 'Commandes'(
)