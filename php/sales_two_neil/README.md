SALES AND INVENTORY PROBLEM 2
=============================

Create a system that contains the following modules:

* A module that maintains (add, edit, delete, and search) product information.
    * Product Code
    * Product Description
    * Stock Level
    * Date Created
    * Quantity
    * Critical Level

*A product code is generated by combining the first 3 alphanumeric characters 
of the product description followed by a 5-digit random number (padded by 
zeros) and the product’s date of creation (ddMMMyyyy).Product quantity is 22% 
of the Stock Level.*

*Quantity always starts at 0.*

*Critical Level is 22% of the Stock Level.*

*When Quantity becomes below critical level. Display a message box.*

* __Product Code:__ EQD-00012-14MAR2010 (program generated)
* __Product Description:__ EQ Dry XL 36s
* __Date Created:__ March 14, 2010 (system date)
* __Stock Level:__ 400
* __Quantity:__ 0 (program generated)
* __Critical Level:__ 88 (program generated, 22% of 400)

* A module that accepts a product code, transaction code and transaction 
quantity, and performs computations based on the Transaction Code.

##Transaction Codes

* O – order (add product quantity)
* S – sale (deduct product quantity)

##Sample Data

* __Product Code:__ EQD-00012-14MAR2010
* __Transaction(Code):__ O
* __Quantity:__ 300

*Quantity becomes 300.*

* __Product Code:__ EQD-00012-14MAR2010
* __Transaction(Code):__ S
* __Quantity:__ 250

*Quantity becomes 50.*

* __Product Code:__ EQD-00012-14MAR2010
* __Transaction(Code):__ S
* __Quantity:__ 40

*Quantity BECOMES 10.*

A Message Box (JavaScript Alert Box) will be displayed.