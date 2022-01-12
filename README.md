# pasd-PoC

## How To Get Started

- Download all the requirements from the `requirements.txt`
- Start your mariadb server

  - On linux
    > sudo systemctl start mariadb
  - On Windows
    > ??
  - On Mac
    > ??

- Create a user to connect to in mariadb

  > CREATE USER 'sample'@'localhost' IDENTIFIED BY 'password';
  > GRANT ALL PRIVILEGES ON _._ TO 'sample'@'localhost';
  > FLUSH PRIVILEGES

- Make two tables

1. supermarket_users

   - Then run this:

     > DROP TABLE IF EXISTS `users`;
     > CREATE TABLE `users` (
     > `id` int(11) NOT NULL AUTO_INCREMENT,
     > `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
     > `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
     > `created_at` datetime DEFAULT current_timestamp(),
     > `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
     > PRIMARY KEY (`id`),
     > UNIQUE KEY `username` (`username`)
     > ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 > COLLATE=utf8mb4_unicode_ci;

   - Hash your password here : https://passwordsgenerator.net/sha256-hash-generator/
   - run this
     > INSERT INTO `users` VALUES (1,'YOUR_USERNAME','YOUR_HASHED_PASSWORD', 'manager')

2. supermarket_products
