-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

CREATE TABLE `city` (
                        `city_id` int NOT NULL AUTO_INCREMENT,
                        `city_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                        PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `phonebook` (
                             `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                             `city` int NOT NULL,
                             `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `owner` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `info` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `is_visible` int NOT NULL DEFAULT '1',
                             `is_company` int NOT NULL DEFAULT '0',
                             PRIMARY KEY (`id`),
                             UNIQUE KEY `id` (`id`),
                             KEY `c` (`city`),
                             KEY `key_phone` (`phone`),
                             KEY `key_name` (`name`),
                             KEY `key_owner` (`owner`),
                             KEY `key_address` (`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `role` (
                        `role_id` int NOT NULL AUTO_INCREMENT,
                        `role_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                        PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `user` (
                        `user_id` int NOT NULL AUTO_INCREMENT,
                        `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `token` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                        PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `user_in_role` (
                                `user_id` int NOT NULL,
                                `role_id` int NOT NULL,
                                PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2020-05-06 00:02:44