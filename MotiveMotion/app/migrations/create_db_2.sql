-- create the database
CREATE DATABASE motive_motion CHARACTER SET=utf8mb4;

-- create the user and grant privileges
CREATE USER 'motive_motion_user'@'localhost' IDENTIFIED BY 'motive_motion_pass';
GRANT ALL ON motive_motion.* TO 'motive_motion_user'@'localhost';

-- create the user and grant privileges
CREATE USER 'motive_motion_user'@'127.0.0.1' IDENTIFIED BY 'motive_motion_pass';
GRANT ALL ON motive_motion.* TO 'motive_motion_user'@'127.0.0.1';

-- Role table (used for user roles like Admin, Member, Trainer)
CREATE TABLE user_roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(128),
    last_name VARCHAR(128),
    password_user VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    role_id INT NOT NULL,
    send_notification BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (role_id) REFERENCES user_roles(id) ON DELETE RESTRICT
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Memberships table
CREATE TABLE memberships (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    price INT NOT NULL,
    type_memb ENUM('monthly', 'annual') NOT NULL,
    starting_date DATE NOT NULL,
    end_date DATE,
    status_memb ENUM('active', 'inactive', 'expired') DEFAULT 'active',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- WorkoutPlans table
CREATE TABLE workout_plans (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    name_plan VARCHAR(255) NOT NULL,
    description_plan TEXT,
    difficulty_level ENUM('beginner', 'intermediate', 'advanced') DEFAULT 'beginner',
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- this table is used to keep track of the migrations that have been run
CREATE TABLE migrations (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    name_migration VARCHAR(128) NOT NULL UNIQUE,
    date_migraton TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_roles (name) VALUES  ('Admin'),  ('Trainer'), ('Member');


INSERT INTO users (first_name,last_name, password_user, email, role_id, send_notification) VALUES
('Smith','John', 'hashedpassword1', 'boss@example.com', 1, TRUE),
('Doe','Jane' , 'hashedpassword2', 'john.trainer@example.com', 2, TRUE),
('Brown','Michael', 'hashedpassword3', 'alice.member@example.com', 3, FALSE),
('Johnson','Emily', 'hashedpassword4', 'bob.member@example.com', 3, TRUE);

INSERT INTO memberships (user_id, type_memb, starting_date, end_date, status_memb,price) VALUES
(3, 'monthly', '2021-01-01', '2021-01-31', 'expired',175),
(4, 'annual', '2021-01-01', '2021-12-31', 'active', 2000),
(3, 'monthly', '2022-03-05', '2021-04-04', 'expired', 200);

INSERT INTO workout_plans (user_id, name_plan, description_plan, difficulty_level, created_date) VALUES
(2, 'Strength Training Beginner', 'A beginner strength training plan focused on building basic strength.', 'beginner', NOW()),
(2, 'Cardio Endurance Intermediate', 'An intermediate cardio workout to improve endurance.', 'intermediate', NOW()),
(2, 'Advanced Muscle Building', 'A challenging workout plan for advanced muscle gain.', 'advanced', NOW());


-- insert the migration
INSERT INTO migrations (name_migration) VALUES ('create_db_1');