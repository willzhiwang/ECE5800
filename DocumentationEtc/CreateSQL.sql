--Not 100% sure where exactly to put this.
--Let me know if there are any errors. There probably are - I'll work on debugging and polishing this on Wednesday.


CREATE DATABASE `Group7Vanpool`;

CREATE TABLE `Group7Vanpool`.`Address` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
--"Name" refers to a person's name, if it's a part of the address.
`Name` VARCHAR(61) NULL,
`Street` INT(127) NOT NULL , 
`City` VARCHAR(31) NOT NULL , 
`State` VARCHAR(2) NOT NULL , 
`ZipCode` VARCHAR(10) NOT NULL ,  
PRIMARY KEY (`ID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`CardType` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`CardName` VARCHAR(31) NOT NULL , 
PRIMARY KEY (`ID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`PaymentInfo` (
`ID` INT NOT NULL AUTO_INCREMENT , 
`CreditCardNumber` VARCHAR(255) NOT NULL , 
`NameOnCard` VARCHAR(255) NOT NULL , 
`ExpirationDate` VARCHAR(255) NOT NULL , 
`SecurityCode` VARCHAR(255) NOT NULL , 
`CardType` INT NOT NULL , 
`BillingAddress` INT NOT NULL , 
PRIMARY KEY (`ID`),
FOREIGN KEY (`CardType`) REFERENCES `CardType`(`ID`)
FOREIGN KEY (`BillingAddress`) REFERENCES `Address`(`ID`),
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`SecurityQuestion` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`Question` VARCHAR(255) NOT NULL ,
PRIMARY KEY  (`ID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`User` (
`ID` INT NOT NULL AUTO_INCREMENT , 
`IsDriver` BOOLEAN NOT NULL , 
`IsAdmin` BOOLEAN NOT NULL ,
`Balance` DECIMAL(12,2) NOT NULL , 
`PaymentInfo` INT NULL , 
PRIMARY KEY (`ID`),
FOREIGN KEY (`PaymentInfo`) REFERENCES `PaymentInfo`(`ID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Person` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`FirstName` VARCHAR(20) NOT NULL , 
`LastName` VARCHAR(20) NOT NULL , 
`DateOfBirth` DATE NOT NULL , 
`PhoneNumber` VARCHAR(16) NOT NULL ,
`Address` INT NOT NULL , 
PRIMARY KEY (`ID`)
FOREIGN KEY (`Address`) REFERENCES `Address`(`ID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Account` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`Email` VARCHAR(64) NOT NULL , 
`Username` VARCHAR(20) NOT NULL , 
`Password` VARCHAR(255) NOT NULL , 
`SecQuestion1` INT NOT NULL , 
`SecAnswer1` VARCHAR(50) NOT NULL , 
`SecQuestion2` INT NULL , 
`SecAnswer2` VARCHAR(50) NULL , 
`SecQuestion3` INT NULL , 
`SecAnswer3` VARCHAR(50) NULL ,
`UserID` INT NOT NULL,
`PersonID` INT NOT NULL,
PRIMARY KEY (`ID`),
FOREIGN KEY (`SecQuestion1`) REFERENCES `SecurityQuestion`(`ID`),
FOREIGN KEY (`SecQuestion2`) REFERENCES `SecurityQuestion`(`ID`),
FOREIGN KEY (`SecQuestion3`) REFERENCES `SecurityQuestion`(`ID`),
FOREIGN KEY (`UserID`) REFERENCES `User`(`ID`),
FOREIGN KEY (`PersonID`) REFERENCES `Person`(`ID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Vehicle` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`OwnerUser` INT NULL , 
`LicensePlate` VARCHAR(9) NOT NULL , 
`Year` VARCHAR(5) NOT NULL , 
`Model` VARCHAR(31) NOT NULL , 
`Color` VARCHAR(15) NOT NULL , 
PRIMARY KEY (`ID`),
FOREIGN KEY (`OwnerUser`) REFERENCES `User`(`ID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Route` ( 
`ID` INT NOT NULL AUTO_INCREMENT , 
`Vehicle` INT NOT NULL , 
`FromAddress` INT NOT NULL , 
`ToAddress` INT NOT NULL , 
`DaysOfWeek` VARCHAR(7) NOT NULL , 
`DepartureTime` TIME NOT NULL , 
`ArrivalTime` TIME NOT NULL , 
`MileDistance` DECIMAL(6,2) NOT NULL ,
`MaxCapacity` INT NOT NULL ,
`CurrCapacity` INT NOT NULL , 
PRIMARY KEY (`ID`),
FOREIGN KEY (`Vehicle`) REFERENCES `Vehicle`(`ID`),
FOREIGN KEY (`FromAddress`) REFERENCES `Address`(`ID`),
FOREIGN KEY (`ToAddress`) REFERENCES `Address`(`ID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`PassengerToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `Users`(`ID`),
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`ID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`DriverToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `Users`(`ID`),
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`ID`)
)
ENGINE = InnoDB;

