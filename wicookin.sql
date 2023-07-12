-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Hôte : 127.0.0.1:3306

-- Généré le : ven. 23 juin 2023 à 18:01

-- Version du serveur : 8.0.31

-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données : `wicookin`

--

-- --------------------------------------------------------

--

-- Structure de la table `addresses`

--

DROP TABLE IF EXISTS addresses;

CREATE TABLE
    IF NOT EXISTS addresses (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        member_id int NOT NULL,
        street varchar(255) DEFAULT NULL,
        postal_code varchar(5) DEFAULT NULL,
        city varchar(255) DEFAULT NULL,
        country varchar(255) DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `categories`

--

DROP TABLE IF EXISTS categories;

CREATE TABLE
    IF NOT EXISTS categories (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) DEFAULT NULL,
        description text,
    );

-- --------------------------------------------------------

--

-- Structure de la table `deliveries`

--

DROP TABLE IF EXISTS deliveries;

CREATE TABLE
    IF NOT EXISTS deliveries (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        order_id int DEFAULT NULL,
        address_id int DEFAULT NULL,
        date timestamp NULL DEFAULT NULL,
        status varchar(255) DEFAULT NULL,
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (address_id) REFERENCES addresses(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `equipment`

--

DROP TABLE IF EXISTS equipment;

CREATE TABLE
    IF NOT EXISTS equipment (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) DEFAULT NULL,
        description text,
        price decimal(10, 2) DEFAULT NULL,
        quantity int DEFAULT NULL
    );

-- --------------------------------------------------------

--

-- Structure de la table `equipment_rooms`

--

DROP TABLE IF EXISTS equipment_rooms;

CREATE TABLE
    IF NOT EXISTS equipment_rooms (
        equipment_id int NOT NULL,
        room_id int NOT NULL,
        PRIMARY KEY (equipment_id, room_id),
        FOREIGN KEY (equipment_id) REFERENCES equipment(id),
        FOREIGN KEY (room_id) REFERENCES rooms(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `events`

--

DROP TABLE IF EXISTS events;

CREATE TABLE
    IF NOT EXISTS events (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(190) NOT NULL,
        description text,
        room_id int DEFAULT NULL,
        member_id int DEFAULT NULL,
        date timestamp NULL DEFAULT NULL,
        time time DEFAULT NULL,
        FOREIGN KEY (room_id) REFERENCES rooms(id),
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `invoices`

--

DROP TABLE IF EXISTS invoices;

CREATE TABLE
    IF NOT EXISTS invoices (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        amount decimal(10, 2) DEFAULT NULL,
        member_id int DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `members`

--

DROP TABLE IF EXISTS members;

CREATE TABLE
    IF NOT EXISTS members (
        id int AUTO_INCREMENT PRIMARY KEY,
        lastname varchar(255) NOT NULL,
        firstname varchar(255) NOT NULL,
        email varchar(190) NOT NULL,
        phonenumber varchar(15) DEFAULT NULL,
        gender varchar(255) DEFAULT NULL,
        date_of_birth date DEFAULT NULL,
        account_creation_date timestamp DEFAULT CURRENT_TIMESTAMP,
        password varchar(255) NOT NULL,
        type varchar(255) DEFAULT NULL,
        profile_picture varchar(255),
        authentication_token CHAR(60) DEFAULT NULL
    );

-- --------------------------------------------------------

--

-- Structure de la table `members_workshops`

--

DROP TABLE IF EXISTS members_workshops;

CREATE TABLE
    IF NOT EXISTS members_workshops (
        member_id int NOT NULL,
        workshop_id int NOT NULL,
        PRIMARY KEY (member_id, workshop_id),
        FOREIGN KEY (member_id) REFERENCES members(id),
        FOREIGN KEY (workshop_id) REFERENCES workshops(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `notifications`

--

DROP TABLE IF EXISTS notifications;

CREATE TABLE
    IF NOT EXISTS notifications (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        member_id int DEFAULT NULL,
        message text,
        date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        status varchar(255) DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `orders`

--

DROP TABLE IF EXISTS orders;

CREATE TABLE
    IF NOT EXISTS orders (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        order decimal(10, 2) DEFAULT NULL,
        member_id int NOT NULL,
        status varchar(255) DEFAULT NULL,
        invoice_id int NOT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id),
        FOREIGN KEY (invoice_id) REFERENCES invoices(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `orders_equipment`

--

DROP TABLE IF EXISTS orders_equipment;

CREATE TABLE
    IF NOT EXISTS orders_equipment (
        order_id int NOT NULL,
        equipment_id int NOT NULL,
        PRIMARY KEY (order_id, equipment_id),
        FOREIGN KEY (order_id) REFERENCES orders(id),
        FOREIGN KEY (equipment_id) REFERENCES equipment(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `promotionaloffers`

--

DROP TABLE IF EXISTS promotionaloffers;

CREATE TABLE
    IF NOT EXISTS promotionaloffers (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        description text,
        promo_code varchar(255) DEFAULT NULL,
        start_date timestamp NULL DEFAULT NULL,
        end_date timestamp NULL DEFAULT NULL,
        discount decimal(10, 2) DEFAULT NULL
    );

-- --------------------------------------------------------

--

-- Structure de la table `reservations`

--

DROP TABLE IF EXISTS reservations;

CREATE TABLE
    IF NOT EXISTS reservations (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        member_id int NOT NULL,
        type varchar(255) DEFAULT NULL,
        date timestamp NULL DEFAULT NULL,
        number_of_people int DEFAULT NULL,
        status varchar(255) DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `reviews`

--

DROP TABLE IF EXISTS reviews;

CREATE TABLE
    IF NOT EXISTS reviews (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        member_id int NOT NULL,
        rating int DEFAULT NULL,
        comment text,
        workshop_id int NOT NULL,
        event_id int DEFAULT NULL,
        member_id int DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id),
        FOREIGN KEY (workshop_id) REFERENCES workshops(id),
        FOREIGN KEY (event_id) REFERENCES events(id),
        FOREIGN KEY (member_id) REFERENCES service_providers(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `rooms`

--

DROP TABLE IF EXISTS rooms;

CREATE TABLE
    IF NOT EXISTS rooms (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) DEFAULT NULL,
        capacity int DEFAULT NULL,
        space_id int DEFAULT NULL,
        FOREIGN KEY (space_id) REFERENCES spaces(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `services`

--

DROP TABLE IF EXISTS services;

CREATE TABLE
    IF NOT EXISTS services (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(190) NOT NULL,
        description text,
        price decimal(10, 2) DEFAULT NULL,
        category_id int NOT NULL,
        member_id int NOT NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id),
        FOREIGN KEY (member_id) REFERENCES members(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `spaces`

--

DROP TABLE IF EXISTS spaces;

CREATE TABLE
    IF NOT EXISTS spaces (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) DEFAULT NULL,
        address_id int NOT NULL,
        FOREIGN KEY (address_id) REFERENCES addresses(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `subscriptions`

--

DROP TABLE IF EXISTS subscriptions;

CREATE TABLE
    IF NOT EXISTS subscriptions (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        type varchar(255) DEFAULT NULL,
        price decimal(10, 2) DEFAULT NULL,
        duration int DEFAULT NULL,
        member_id int NOT NULL,
        invoice_id int NOT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id),
        FOREIGN KEY (invoice_id) REFERENCES invoices(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `trainingcourseprogress`

--

DROP TABLE IF EXISTS trainingcourseprogress;

CREATE TABLE
    IF NOT EXISTS trainingcourseprogress (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        member_id int DEFAULT NULL,
        schedule_id int DEFAULT NULL,
        progress decimal(3, 2) DEFAULT NULL,
        start_date timestamp NULL DEFAULT NULL,
        end_date timestamp NULL DEFAULT NULL,
        FOREIGN KEY (member_id) REFERENCES members(id),
        FOREIGN KEY (schedule_id) REFERENCES trainingcourseschedules(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `trainingcourses`

--

DROP TABLE IF EXISTS trainingcourses;

CREATE TABLE
    IF NOT EXISTS trainingcourses (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        type varchar(255) DEFAULT NULL,
        description text,
        duration int DEFAULT NULL,
        price decimal(10, 2) DEFAULT NULL,
        category_id int DEFAULT NULL,
        mode varchar(255) DEFAULT NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `trainingcourseschedules`

--

DROP TABLE IF EXISTS trainingcourseschedules;

CREATE TABLE
    IF NOT EXISTS trainingcourseschedules (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        training_course_id int NOT NULL,
        date timestamp NULL DEFAULT NULL,
        content text,
        status varchar(255) DEFAULT NULL,
        FOREIGN KEY (training_course_id) REFERENCES trainingcourses(id)
    );

-- --------------------------------------------------------

--

-- Structure de la table `transactionhistory`

--

DROP TABLE IF EXISTS transactionhistory;

CREATE TABLE
    IF NOT EXISTS transactionhistory (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        type varchar(255) DEFAULT NULL COLLATE utf8mb4_general_ci,
        reference int DEFAULT NULL,
        date timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        status varchar(255) DEFAULT NULL COLLATE utf8mb4_general_ci,
    );

-- --------------------------------------------------------

--

-- Structure de la table `workshops`

--

DROP TABLE IF EXISTS workshops;

CREATE TABLE
    IF NOT EXISTS workshops (
        id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(255) DEFAULT NULL COLLATE utf8mb4_general_ci,
        description text DEFAULT NULL COLLATE utf8mb4_general_ci,
        date datetime DEFAULT NULL,
        category_id int DEFAULT NULL,
        room_id int DEFAULT NULL,
        FOREIGN KEY (category_id) REFERENCES categories(id),
        FOREIGN KEY (room_id) REFERENCES rooms(id)
    );

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;