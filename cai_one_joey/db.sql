CREATE DATABASE cai_one_daryll;
USE cai_one_daryll;

CREATE TABLE questions
(question_id INT AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(200), 
answer VARCHAR(200),
question_value INT
);


INSERT INTO questions VALUES
(null, 'what is love', 'secret', 10),
(null, 'what is the capital city of philippines', 'manila', 10),
(null, 'who formulated the theory of relativity', 'albert einstein', 15),
(null, 'what is the 5th state of matter', 'bose einstein condensate', 10),
(null, 'what is specific heat of water', '1', 20),
(null, 'what is the chemical formula for Zirconium', 'Zr', 15)

