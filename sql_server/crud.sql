/*
    Table name: Products

    Columns:
    ProductCode VARCHAR(255) NOT NULL PRIMARY KEY,
    ProductDescription VARCHAR(255),
    Quantity INT,
    Price DECIMAL,
    MinimumOrder INT,
    BulkOrder INT,
    CriticalLevel INT
*/

/*
    Select
*/

--Simplest Select Statement
SELECT * FROM Products;

--How many products are there?
SELECT COUNT(*) FROM Products;

--Select Specific columns only.
SELECT ProductCode, ProductDescription FROM Products;

--Get the products in order of least quantity to highest
SELECT * FROM Products ORDER BY Quantity ASC ;

--Get the products which has a quantity less than the critical level
SELECT * FROM Products WHERE Quantity < CriticalLevel;

--Get the 5 most expensive products in terms of price
SELECT TOP 5 * FROM Products ORDER BY Price;

--Get the top 1% most expensive products in terms of price
SELECT TOP 1 PERCENT * FROM Products ORDER BY Price;

/*
    Insert
    Product Code: NID-03212-APR032012 (program generated)
    Product Description: Nido Milk
    Quantity: 700
    Price: 20
    Minimum Order: 20
    Bulk Order: 60
    Critical Level: 294
*/

INSERT INTO Products (ProductCode, ProductDescription, Quantity, Price, 
    MinimumOrder, BulkOrder, CriticalLevel) 
VALUES ('NID-03212-APR032012', 'Nido Milk', 700, 60, 
    20, 60, 294);

/*
    Update the NID-03212-APR032012, add 100 to quantity. Change critical level 
    to 200.
*/

UPDATE Products 
SET Quantity = Quantity + 100, CriticalLevel = 200 
WHERE ProductCode = 'NID-03212-APR032012';

/*
    Delete the entry NID-03212-APR032012 from the database.
*/

DELETE FROM Products WHERE ProductCode = 'NID-03212-APR032012';