CREATE DATABASE IF NOT EXISTS admin_system_db;
USE admin_system_db;

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin password is 'admin123'
-- Hash is generated using PHP's password_hash('admin123', PASSWORD_BCRYPT)
INSERT INTO admins (username, password) VALUES ('admin', '$2y$10$BHua1Ab5eRs06W2R0dz9BOHO.7r.mpgu46pYIcgttP7fpfR3Nvt5e') ON DUPLICATE KEY UPDATE password='$2y$10$BHua1Ab5eRs06W2R0dz9BOHO.7r.mpgu46pYIcgttP7fpfR3Nvt5e';

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    index_number VARCHAR(50) NOT NULL UNIQUE,
    status VARCHAR(50) DEFAULT 'Active',
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    nic_number VARCHAR(20),
    email VARCHAR(100),
    phone_number VARCHAR(20),
    whatsapp_number VARCHAR(20),
    student_photo VARCHAR(255),
    district VARCHAR(100),
    ds_division VARCHAR(100),
    gn_division VARCHAR(100),
    home_address TEXT,
    google_map_link TEXT,
    latitude VARCHAR(50),
    longitude VARCHAR(50),
    guardian_name VARCHAR(150),
    guardian_relationship VARCHAR(50),
    guardian_occupation VARCHAR(100),
    guardian_phone VARCHAR(20),
    guardian_email VARCHAR(100),
    guardian_photo VARCHAR(255),
    admission_program VARCHAR(100),
    batch_year VARCHAR(10),
    admission_date DATE,
    current_grade VARCHAR(50),
    previous_school_name VARCHAR(150),
    previous_school_location VARCHAR(150),
    last_grade VARCHAR(50),
    reason_leaving_school TEXT,
    madrasa_name VARCHAR(150),
    madrasa_location VARCHAR(150),
    medium_of_study VARCHAR(50),
    reason_leaving_madrasa TEXT,
    doc_nic_front VARCHAR(255),
    doc_nic_back VARCHAR(255),
    doc_signature VARCHAR(255),
    doc_birth_cert VARCHAR(255),
    doc_medical_report VARCHAR(255),
    doc_guardian_nic VARCHAR(255),
    doc_guardian_photo VARCHAR(255),
    doc_leaving_cert VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
