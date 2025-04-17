CREATE DATABASE IF NOT EXISTS scodeblog;

USE scodeblog;

--
-- TABLE user
--

CREATE TABLE IF NOT EXISTS `user` ( 
  `id` SERIAL PRIMARY KEY,
  `name` VARCHAR(255) UNIQUE,   
  `email` VARCHAR(255) UNIQUE,
  `validate` tinyint(1) NOT NULL DEFAULT 0,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `realm` VARCHAR(50) NOT NULL,
  `pswhash` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) UNIQUE,
  `created_at` TIMESTAMP DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;

-- 
-- username : admin
-- email : admin@admin.com
-- psw: ChangeMe01
--

INSERT INTO `user` (`id`, `name`, `email`, `validate`, `archive`, `realm`, `pswhash`, `token`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', 0, 0, 'super', '$2y$10$B4a3.4RZj9ZtCcmA6qwUX.Cjog/o4mKpjAZJR6tCLqHtwP.P7E4PS', 'tokenToBeCreated', '2024-11-06 17:56:13');



--
-- TABLE post
--

CREATE TABLE IF NOT EXISTS `post` ( 
  `id` SERIAL PRIMARY KEY,
  `name` VARCHAR(255) UNIQUE,   
  `slug` VARCHAR(255) UNIQUE,
  `userId` bigint NOT NULL,
  `author` VARCHAR(255) UNIQUE,
  `archive` tinyint(1) DEFAULT 0 NULL,
  `image_url` VARCHAR(255) NULL,
  `body` TEXT NULL,
  `created_at` TIMESTAMP DEFAULT NOW()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_as_cs;