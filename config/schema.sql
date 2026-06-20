-- ============================================
-- DATABASE SCHEMA — Jeam As Brochure Generator
-- ============================================

CREATE DATABASE IF NOT EXISTS flytify CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE flytify;

CREATE TABLE IF NOT EXISTS submissions (
    id                INT AUTO_INCREMENT PRIMARY KEY,
    full_name         VARCHAR(255) NOT NULL,
    company_name      VARCHAR(255),
    tagline           VARCHAR(100),
    email             VARCHAR(255),
    phone             VARCHAR(50),
    model             VARCHAR(20) DEFAULT 'model1',
    primary_color     VARCHAR(7)  DEFAULT '#3B82F6',
    secondary_color   VARCHAR(7)  DEFAULT '#1E3A5F',
    custom_image_path VARCHAR(500),
    created_at        TIMESTAMP   DEFAULT CURRENT_TIMESTAMP
);
