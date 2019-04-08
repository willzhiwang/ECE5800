
/*
Not 100% sure where exactly to put this.
Let me know if there are any errors.
*/

CREATE DATABASE `Group7Vanpool`;

USE `Group7Vanpool`;

CREATE TABLE `Group7Vanpool`.`Address` ( 
`AddressID` INT NOT NULL AUTO_INCREMENT , 
`Name` VARCHAR(61) NULL,
`Street` VARCHAR(127) NOT NULL , 
`City` VARCHAR(31) NOT NULL , 
`State` VARCHAR(2) NOT NULL , 
`ZipCode` VARCHAR(10) NOT NULL ,  
PRIMARY KEY (`AddressID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`CardType` ( 
`CardTypeID` INT NOT NULL AUTO_INCREMENT , 
`CardName` VARCHAR(31) NOT NULL , 
PRIMARY KEY (`CardTypeID`)
) 
ENGINE = InnoDB;

INSERT INTO `Group7Vanpool`.`CardType`(`CardName`) VALUES ("Mastercard");
INSERT INTO `Group7Vanpool`.`CardType`(`CardName`) VALUES ("Visa");

CREATE TABLE `Group7Vanpool`.`PaymentInfo` (
`PaymentInfoID` INT NOT NULL AUTO_INCREMENT , 
`CreditCardNumber` VARCHAR(255) NOT NULL , 
`NameOnCard` VARCHAR(255) NOT NULL , 
`ExpirationDate` VARCHAR(255) NOT NULL , 
`SecurityCode` VARCHAR(255) NOT NULL , 
`CardType` INT NOT NULL , 
`BillingAddress` INT NOT NULL , 
PRIMARY KEY (`PaymentInfoID`),
FOREIGN KEY (`CardType`) REFERENCES `CardType`(`CardTypeID`),
FOREIGN KEY (`BillingAddress`) REFERENCES `Address`(`AddressID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`SecurityQuestion` ( 
`SecurityQuestionID` INT NOT NULL AUTO_INCREMENT , 
`Question` VARCHAR(255) NOT NULL ,
PRIMARY KEY  (`SecurityQuestionID`)
) 
ENGINE = InnoDB;

INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What is your mother's maiden name?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What was the name of your elementary school?");

CREATE TABLE `Group7Vanpool`.`User` (
`UserID` INT NOT NULL AUTO_INCREMENT , 
`IsDriver` BOOLEAN NOT NULL , 
`IsAdmin` BOOLEAN NOT NULL ,
`Balance` DECIMAL(12,2) NOT NULL , 
`PaymentInfo` INT NULL , 
PRIMARY KEY (`UserID`),
FOREIGN KEY (`PaymentInfo`) REFERENCES `PaymentInfo`(`PaymentInfoID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Person` ( 
`PersonID` INT NOT NULL AUTO_INCREMENT , 
`FirstName` VARCHAR(20) NULL , 
`LastName` VARCHAR(20) NULL , 
`DateOfBirth` DATE NULL , 
`PhoneNumber` VARCHAR(16) NULL ,
`Address` INT NULL , 
PRIMARY KEY (`PersonID`),
FOREIGN KEY (`Address`) REFERENCES `Address`(`AddressID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Account` ( 
`AccountID` INT NOT NULL AUTO_INCREMENT , 
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
`PersonID` INT NULL,
PRIMARY KEY (`AccountID`),
FOREIGN KEY (`SecQuestion1`) REFERENCES `SecurityQuestion`(`SecurityQuestionID`),
FOREIGN KEY (`SecQuestion2`) REFERENCES `SecurityQuestion`(`SecurityQuestionID`),
FOREIGN KEY (`SecQuestion3`) REFERENCES `SecurityQuestion`(`SecurityQuestionID`),
FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`),
FOREIGN KEY (`PersonID`) REFERENCES `Person`(`PersonID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Vehicle` ( 
`VehicleID` INT NOT NULL AUTO_INCREMENT , 
`OwnerUser` INT NULL , 
`LicensePlate` VARCHAR(9) NOT NULL , 
`Year` VARCHAR(5) NOT NULL , 
`Model` VARCHAR(31) NOT NULL , 
`Color` VARCHAR(15) NOT NULL , 
`MaxCapacity` INT NOT NULL ,
PRIMARY KEY (`VehicleID`),
FOREIGN KEY (`OwnerUser`) REFERENCES `User`(`UserID`)
) 
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`Route` ( 
`RouteID` INT NOT NULL AUTO_INCREMENT , 
`Vehicle` INT NOT NULL , 
`FromAddress` INT NOT NULL , 
`ToAddress` INT NOT NULL , 
`DepartureTime` TIME NOT NULL , 
`ArrivalTime` TIME NOT NULL , 
`MileDistance` DECIMAL(6,2) NOT NULL ,
  --For capacities:
  --A NULL capacity means the van doesn't run on that day.
  --A numeric capacity shows how many seats are still empty.
`MonCapacity` INT NULL ,
`TueCapacity` INT NULL ,
`WedCapacity` INT NULL ,
`ThuCapacity` INT NULL ,
`FriCapacity` INT NULL ,
`SatCapacity` INT NULL ,
`SunCapacity` INT NULL , 
PRIMARY KEY (`RouteID`),
FOREIGN KEY (`Vehicle`) REFERENCES `Vehicle`(`VehicleID`),
FOREIGN KEY (`FromAddress`) REFERENCES `Address`(`AddressID`),
FOREIGN KEY (`ToAddress`) REFERENCES `Address`(`AddressID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`PassengerToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`),
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`RouteID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`DriverToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`),
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`RouteID`)
)
ENGINE = InnoDB;
