CREATE DATABASE cai_one_bound;
USE cai_one_bound;

CREATE TABLE questions
(question_id INT AUTO_INCREMENT PRIMARY KEY,
question VARCHAR(200), 
answer VARCHAR(200),
question_value INT
);
