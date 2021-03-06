/*
    CREATE TABLE SYNTAX
    CREATE TABLE table_name
    (
    column_name1 data_type(size),
    column_name2 data_type(size),
    column_name3 data_type(size),
    ...
    )
*/

-- Simplest Example: Registration System for a Website

CREATE TABLE Users
(
    Id INT NOT NULL PRIMARY KEY, -- Unique identifier
    Email_Address VARCHAR(255),
    Password VARCHAR(60)
);


-- Use Student Number as Primary Key, ex: 20100123456
CREATE TABLE UE_Students
(
    StudentNumber CHAR(9), --Char means: fixed to 9 characters only
    FirstName VARCHAR(255),
    LastName VARCHAR(255)
);

/*

PRIMARY KEY: Product Code
A product code is generated by combining the first 3 alphanumeric characters 
of the product description followed by a 5-digit random number (padded by 
zeros) and the product’s date of creation (ddMMMyyyy).Product quantity is 22% 
of the Stock Level.

*/
CREATE TABLE Products
(
    ProductCode VARCHAR(255) NOT NULL PRIMARY KEY,
    ProductDescription VARCHAR(255),
    Quantity INT,
    Price DECIMAL,
    MinimumOrder INT,
    BulkOrder INT,
    CriticalLevel INT
);