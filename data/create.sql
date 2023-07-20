-- Use the database
USE onirix;

-- Create the user table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    age INT,
    gender VARCHAR(20),
);

-- Create the dreams table
CREATE TABLE dreams (
    dream_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    theme VARCHAR(100) NOT NULL,
    sentiment VARCHAR(20),
    dream_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
-- Example dataset
INSERT INTO users (login, password, age, gender)
VALUES
    ('Pauline', 'password1', 28, 'female'),
    ('Willy', 'password2', 28, 'male');
INSERT INTO dreams (user_id, theme, sentiment, dream_date)
VALUES
    (1, 'Flying over Reunion', 'positive', '2023-07-15'),
    (1, 'Lost in a desert', 'negative', '2023-07-16'),
    (2, 'Meeting with work friends', 'positive', '2023-07-17'),
    (2, 'Running in the woods', 'neutral', '2023-07-18');