USE especialphoto_dk_db;

CREATE TABLE `news` (
  `newsID` int(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `title` varchar(100) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` blob NOT NULL
); 

INSERT INTO `news` (`newsID`, `title`, `image`, `description`) VALUES
(1, 'Programmer Explains Why They Keep Rubber Ducks By Their Computers', 'news1.jpg', 'anything');

CREATE TABLE category
(
    catID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    categoryName VARCHAR(255) NULL
);

INSERT INTO category VALUES (NULL, 'summer duck');
INSERT INTO category VALUES (NULL, 'winter duck');
INSERT INTO category VALUES (NULL, 'bath duck');

CREATE TABLE size
(
    sizeID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    sizeName VARCHAR(50) NULL
);
INSERT INTO size VALUES (NULL, 'XS');
INSERT INTO size VALUES (NULL, 'S');
INSERT INTO size VALUES (NULL, 'M');
INSERT INTO size VALUES (NULL, 'L');
INSERT INTO size VALUES (NULL, 'XL');

CREATE TABLE `postalCode`
(
    PostalCodeID VARCHAR(20) NOT NULL PRIMARY KEY,
    city VARCHAR(255)
);
INSERT INTO `postalCode` VALUES ('3456', 'Esbjerg');
INSERT INTO `postalCode` VALUES ('4567', 'Odense');
INSERT INTO `postalCode` VALUES ('6577', 'Copenhagen');
INSERT INTO `postalCode` VALUES ('6789', 'Aalborg');
INSERT INTO `postalCode` VALUES ('4569', 'Kolding');

CREATE TABLE company (
    cid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CompanyName VARCHAR(255),
    `dscription` BLOB NULL,
    email VARCHAR(320),
    phoneNumber VARCHAR(320),
    postalCodee VARCHAR(20) NULL,
    FOREIGN KEY (postalCodee) REFERENCES postalCode (PostalCodeID)
);
INSERT INTO company VALUES (Null, 'Duck Land', 'A rubber duck  is a toy.', 'toy@gmail.com', '50329820', '3456');

CREATE TABLE `product`
(
    productID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pname VARCHAR(255) NOT NULL,
    Image VARCHAR(255),
    `inStock` BOOLEAN NULL, 
    `rating` FLOAT NULL,
    `price` DECIMAL(10,2),
    category INT,
    `description` blob NULL,
    FOREIGN KEY (category) REFERENCES category (catID)
);
INSERT INTO product VALUES (6, 'Rubber', '', true, 123.6, 21, 1, '');
-- INSERT INTO product VALUES (1, 'Rubber', 'duck.png');
-- INSERT INTO product VALUES (2, 'Rubber Duck', 'ruber.jpg');
-- INSERT INTO product VALUES (3, 'Rubber Duck', 'yellow.PDF');
-- INSERT INTO product VALUES (4, 'Rubber duck debugging', 'duck.svg');
-- INSERT INTO product VALUES (5, 'Rubber duck debugging', 'yellow.png');

CREATE TABLE `users` (
  `usersId` int(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `usersName` varchar(120) NOT NULL,
  `usersEmail` varchar(20) NOT NULL,
  `usersUid` varchar(20) NOT NULL,
  `usersPwd` varchar(100) NOT NULL,
    postalCodee VARCHAR(20) NULL,
    FOREIGN KEY (postalCodee) REFERENCES postalCode (PostalCodeID)
);
INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, '1', '1@gmail.com', '1', '$2y$10$PkXty17E9z9Y5br0XRv2fuZUNQet2Jm0zNbUuiBD6QYRDC/5sVd06'),
(2, 'Edina Ilyes', 'ilyesedina10@gmail.c', 'user1', '$2y$10$L8wluWKKRb.m1BXs.HaQsuZN35Yo4whlHegBWRC8lP45rcV9oNPkq'),
(3, '3', '3@gmail.com', '3', '$2y$10$sTmdpMNg72eF4WXrvh4MCeFeu1E4B5C5.//v.vc/eEtCzch3as1Oe');

CREATE TABLE productSize
(
    productID INT NOT NULL,
    sizeID INT NOT NULL,
    CONSTRAINT PK_ProductSize PRIMARY KEY (productID, sizeID),        
    FOREIGN KEY (productID) REFERENCES product (productID) ON DELETE CASCADE,    
    FOREIGN KEY (sizeID) REFERENCES size (sizeID) 
);
CREATE TABLE review
(
    ReviewID int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user int(10) NOT NULL,
    productID INT NOT NULL,
    Contents varchar(30000),
    FOREIGN KEY (user) REFERENCES `users` (`usersId`),
    FOREIGN KEY (productID) REFERENCES product (productID) ON DELETE CASCADE
);
INSERT INTO review VALUES (NULL, 2, 6, '');
INSERT INTO review (user, productID, Contents) VALUES (2, 6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus ipsum at sagittis varius. Nullam non velit elit. Quisque finibus tortor mattis sapien condimentum feugiat. Sed placerat felis ullamcorper lectus porttitor, a hendrerit odio lacinia. Morbi et turpis enim. Proin ac viverra tortor. Sed vulputate bibendum arcu, et sodales libero pretium id. Nullam rhoncus magna a lacus tempus finibus. Proin vel risus quis sapien posuere eleifend consequat vitae lacus. Nam interdum egestas sapien a tempor.');
INSERT INTO review (user, productID, Contents) VALUES (2, 6,'Nulla non porttitor ex. Phasellus venenatis dui vel magna bibendum feugiat. Sed sit amet arcu sit amet ex consectetur congue a nec enim. Sed cursus ligula ante. In in augue augue. Curabitur at orci a turpis dignissim ornare id quis purus. Sed sodales ipsum eget scelerisque pretium. Aliquam nec iaculis nulla. Etiam rutrum enim at lectus maximus porttitor. Aenean mattis scelerisque mattis. Mauris posuere sem euismod enim rhoncus, vitae consectetur mauris porttitor.');
INSERT INTO review (user, productID, Contents) VALUES (2, 6,'Vivamus pulvinar posuere eleifend. Aenean et gravida nulla. Fusce tempor mi ac mi porta pharetra. Donec sed felis sed eros lobortis scelerisque sit amet sed metus. Sed accumsan dignissim dui, eget finibus risus. Nullam laoreet sem id leo varius sodales. Donec porta massa massa, sit amet dignissim diam scelerisque convallis. Aliquam erat volutpat. Suspendisse ultrices imperdiet magna. Etiam vehicula sed felis maximus maximus.');

CREATE TABLE `order`
(
    OrderID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `PaymentMethod` VARCHAR(50) NOT NULL,
    `totalPrise` DECIMAL(10,2),
    orderDate DATETIME,
    deliveryDate DATETIME,
    user int(10) NOT NULL,
    FOREIGN KEY (user) REFERENCES `users` (`usersId`)
);
INSERT INTO `order` VALUES (NULL, 'PaymentMethod', '', '2020-12-01' '12:10:00', '2020-12-08''', 2);
INSERT INTO `order` VALUES (NULL, 'PaymentMethod', '', '2020-12-07' '11:10:00', '2020-12-15''', 2);

CREATE TABLE orderLines
(
    productID INT(11) NOT NULL,
    OrderID INT(11) NOT NULL,
    `Quataty` INT(11),
    `price` DECIMAL(10,2),
    CONSTRAINT PK_OrderLines PRIMARY KEY (productID, OrderID),        
    FOREIGN KEY (productID) REFERENCES `product` (productID) ON DELETE CASCADE,    
    FOREIGN KEY (OrderID) REFERENCES `order` (OrderID) 
);

SELECT `usersName` FROM `users` WHERE `usersId` = 2;
CREATE VIEW companyinformation AS SELECT * FROM company JOIN postalCode ON company.postalCodee = postalCode.PostalCodeID;
CREATE VIEW productview AS SELECT * FROM product JOIN category ON product.category = category.catID;

