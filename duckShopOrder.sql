DROP DATABASE IF EXISTS duckShopDB;
CREATE DATABASE duckShopDB;
USE duckShopDB;

CREATE TABLE Category
(
    catID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryName VARCHAR(255) NULL
);

INSERT INTO Category VALUES (NULL, 'summer duck');
INSERT INTO Category VALUES (NULL, 'winter duck');
INSERT INTO Category VALUES (NULL, 'bath duck');

CREATE TABLE Size
(
    sizeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    sizeName VARCHAR(50) NULL
);
INSERT INTO Size VALUES (NULL, 'XS');
INSERT INTO Size VALUES (NULL, 'S');
INSERT INTO Size VALUES (NULL, 'M');
INSERT INTO Size VALUES (NULL, 'L');
INSERT INTO Size VALUES (NULL, 'XL');

CREATE TABLE OpeningHours (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    day varchar(16) NOT NULL,
    open_time time,
    close_time time
);
INSERT INTO OpeningHours VALUES (NULL, 'Monday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Tuesday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Wednesday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Thursday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Friday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Saturday', '09:00', '18:00');
INSERT INTO OpeningHours VALUES (NULL, 'Sunday', '09:00', '18:00');

CREATE TABLE `PostalCode`
(
    PostalCodeID VARCHAR(20) NOT NULL PRIMARY KEY,
    city VARCHAR(255)
);
INSERT INTO `PostalCode` VALUES ('3456', 'Esbjerg');
INSERT INTO `PostalCode` VALUES ('4567', 'Odense');
INSERT INTO `PostalCode` VALUES ('6577', 'Copenhagen');
INSERT INTO `PostalCode` VALUES ('6789', 'Aalborg');
INSERT INTO `PostalCode` VALUES ('4569', 'Kolding');

CREATE TABLE Company (
    cid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CompanyName VARCHAR(255),
    `dscription` VARCHAR(65535) NULL,
    email VARCHAR(320),
    phoneNumber VARCHAR(320),
    postalCodee VARCHAR(20) NULL,
    FOREIGN KEY (postalCodee) REFERENCES PostalCode (PostalCodeID)
);
INSERT INTO Company VALUES (Null, 'Duck Land', 'A rubber duck  is a toy.', 'toy@gmail.com', '50329820', '3456');

CREATE TABLE Costumer 
(
    CID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cname VARCHAR(255) NOT NULL,
    postalCode VARCHAR(20) NULL,
    usersEmail VARCHAR(320),
    password VARCHAR(100),
    FOREIGN KEY (postalCode) REFERENCES PostalCode (PostalCodeID)
);

INSERT INTO Costumer VALUES (NULL, 'Harri Seywood', '3456');
INSERT INTO Costumer VALUES (NULL, 'Peter Peterson', '3456');
INSERT INTO Costumer VALUES (NULL, 'Boniface Loadsman', '3456');
INSERT INTO Costumer VALUES (NULL, 'Ally Trymme', '3456');
INSERT INTO Costumer VALUES (NULL, 'Colin Jest', '3456');
INSERT INTO Costumer VALUES (NULL, 'Fax Yendall', '3456');

CREATE TABLE `Product`
(
    productID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pname VARCHAR(255) NOT NULL,
    Image VARCHAR(255),
    `inStock` BOOLEAN NULL, 
    `rating` FLOAT NULL,
    `price` DECIMAL(10,2),
    category INT,
    FOREIGN KEY (category) REFERENCES Category (catID)
);

INSERT INTO Product VALUES (NULL, 'Rubber', '', true, 123.6, 21, 1);
-- INSERT INTO Product VALUES (NULL, 'Rubber', 'duck.png');
-- INSERT INTO Product VALUES (NULL, 'Rubber Duck', 'ruber.jpg');
-- INSERT INTO Product VALUES (NULL, 'Rubber Duck', 'yellow.PDF');
-- INSERT INTO Product VALUES (NULL, 'Rubber duck debugging', 'duck.svg');
-- INSERT INTO Product VALUES (NULL, 'Rubber duck debugging', 'yellow.png');



CREATE TABLE ProductSize
(
    productID INT NOT NULL,
    sizeID INT NOT NULL,
    CONSTRAINT PK_ProductSize PRIMARY KEY (productID, sizeID),        
    FOREIGN KEY (productID) REFERENCES Product (productID),    
    FOREIGN KEY (sizeID) REFERENCES Size (sizeID) 
);
CREATE TABLE `Order`
(
    OrderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `PaymentMethod` VARCHAR(50) NOT NULL,
    product INT,
    `totalPrise` DECIMAL(10,2),
    orderDate DATETIME,
    deliveryDate DATETIME,
    FOREIGN KEY (product) REFERENCES Costumer (CID)
);
CREATE TABLE OrderLines
(
    productID INT NOT NULL,
    OrderID INT NOT NULL,
    `Quataty` INT,
    `price` DECIMAL(10,2),
    CONSTRAINT PK_OrderLines PRIMARY KEY (productID, OrderID),        
    FOREIGN KEY (productID) REFERENCES `Product` (productID),    
    FOREIGN KEY (OrderID) REFERENCES `Order` (OrderID) 
);

-- Create user and grant access to this specific database 
DROP USER IF EXISTS 'dbuser'@'localhost';
CREATE USER 'dbuser'@'localhost' IDENTIFIED BY '1234'; 
GRANT SELECT, INSERT, UPDATE, DELETE ON duckShopDB.* To 'dbuser'@'localhost' IDENTIFIED BY '1234'; FLUSH PRIVILEGES;

-- GRANT ALL PRIVILEGES ON ReviewDB.* To 'dbuser'@'localhost' IDENTIFIED BY '1234'; FLUSH PRIVILEGES;