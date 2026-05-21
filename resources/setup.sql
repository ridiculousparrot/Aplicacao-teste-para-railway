-- ============================================================
-- Script SQL — Sistema Auth Laravel
-- Para usar no Railway: copie e cole no Query Editor do MySQL
-- ou importe via railway run mysql < setup.sql
-- ============================================================

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS `users` (
  `id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`              VARCHAR(255)    NOT NULL,
  `email`             VARCHAR(255)    NOT NULL,
  `email_verified_at` TIMESTAMP       NULL DEFAULT NULL,
  `password`          VARCHAR(255)    NOT NULL,
  `remember_token`    VARCHAR(100)    NULL DEFAULT NULL,
  `created_at`        TIMESTAMP       NULL DEFAULT NULL,
  `updated_at`        TIMESTAMP       NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de sessões (necessária pois SESSION_DRIVER=database)
CREATE TABLE IF NOT EXISTS `sessions` (
  `id`           VARCHAR(255)    NOT NULL,
  `user_id`      BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address`   VARCHAR(45)     NULL DEFAULT NULL,
  `user_agent`   TEXT            NULL DEFAULT NULL,
  `payload`      LONGTEXT        NOT NULL,
  `last_activity` INT            NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index`       (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela de controle de migrations do Laravel (necessária se usar php artisan migrate)
CREATE TABLE IF NOT EXISTS `migrations` (
  `id`        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch`     INT          NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Pronto! Agora configure as variáveis de ambiente no Railway:
--   DB_CONNECTION = mysql
--   DB_HOST       = <MYSQLHOST do Railway>
--   DB_PORT       = <MYSQLPORT>
--   DB_DATABASE   = <MYSQLDATABASE>
--   DB_USERNAME   = <MYSQLUSER>
--   DB_PASSWORD   = <MYSQLPASSWORD>
--   SESSION_DRIVER = database
--   APP_KEY       = (gerar com: php artisan key:generate)
-- ============================================================
