/*
Not 100% sure where exactly to put this.
Let me know if there are any errors.
*/

DROP DATABASE IF EXISTS `Group7Vanpool`;

CREATE DATABASE `Group7Vanpool`;

USE `Group7Vanpool`;


CREATE TABLE `Group7Vanpool`.`States` (
`StateID` INT NOT NULL AUTO_INCREMENT ,
`StateAbbrev` VARCHAR(2) NOT NULL ,
`StateName` VARCHAR(50) NOT NULL ,
PRIMARY KEY (`StateID`)
)
ENGINE = InnoDB;

INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("AL", "Alabama");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("AK", "Alaska");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("AZ", "Arizona");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("AR", "Arkansas");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("CA", "California");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("CO", "Colorado");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("CT", "Connecticut");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("DE", "Delaware");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("FL", "Florida");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("GA", "Georgia");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("HI", "Hawaii");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("ID", "Idaho");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("IL", "Illinois");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("IN", "Indiana");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("IA", "Iowa");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("KS", "Kansas");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("KY", "Kentucky");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("LA", "Louisiana");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("ME", "Maine");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MD", "Maryland");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MA", "Massachusetts");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MI", "Michigan");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MN", "Minnesota");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MS", "Mississippi");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MO", "Missouri");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("MT", "Montana");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NE", "Nebraska");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NV", "Nevada");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NH", "New Hampshire");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NJ", "New Jersey");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NM", "New Mexico");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NY", "New York");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("NC", "North Carolina");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("ND", "North Dakota");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("OH", "Ohio");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("OK", "Oklahoma");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("OR", "Oregon");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("PA", "Pennsylvania");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("RI", "Rhode Island");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("SC", "South Carolina");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("SD", "South Dakota");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("TN", "Tennessee");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("TX", "Texas");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("UT", "Utah");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("VT", "Vermont");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("VA", "Virginia");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("WA", "Washington");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("WV", "West Virginia");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("WI", "Wisconsin");
INSERT INTO `Group7Vanpool`.`States`(`StateAbbrev`,`StateName`) VALUES ("WY", "Wyoming");


CREATE TABLE `Group7Vanpool`.`Address` (
`AddressID` INT NOT NULL AUTO_INCREMENT ,
`Name` VARCHAR(61) NULL,
`Street` VARCHAR(127) NOT NULL ,
`City` VARCHAR(31) NOT NULL ,
`State` INT NOT NULL ,
`ZipCode` VARCHAR(10) NOT NULL , 
PRIMARY KEY (`AddressID`),
FOREIGN KEY (`State`) REFERENCES `States`(`StateID`)
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
`CardType` VARCHAR(31) NOT NULL , 
`BillingAddress` INT NOT NULL , 
PRIMARY KEY (`PaymentInfoID`),
FOREIGN KEY (`BillingAddress`) REFERENCES `Address`(`AddressID`)
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`SecurityQuestion` ( 
`SecurityQuestionID` INT NOT NULL AUTO_INCREMENT , 
`Question` VARCHAR(255) NOT NULL ,
PRIMARY KEY  (`SecurityQuestionID`)
) 
ENGINE = InnoDB;

INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What is your maternal grandmother's maiden name?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What was the name of your elementary school?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What is your favorite football team?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What was the last name of your favorite elementary school teacher?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("In which town or city did your parents meet?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What was your favorite food as a child?");
INSERT INTO `Group7Vanpool`.`SecurityQuestion`(`Question`) VALUES ("What was the name of the company where you had your first job?");

CREATE TABLE `Group7Vanpool`.`User` (
`UserID` INT NOT NULL AUTO_INCREMENT , 
`IsDriver` BOOLEAN NOT NULL , 
`IsAdmin` BOOLEAN NOT NULL ,
`Balance` DECIMAL(12,2) NOT NULL , 
`PaymentInfo` INT NULL , 
`LastPurchasedMonthly` DATETIME NULL , 
PRIMARY KEY (`UserID`),
FOREIGN KEY (`PaymentInfo`) REFERENCES `PaymentInfo`(`PaymentInfoID`) ON DELETE SET NULL
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
FOREIGN KEY (`Address`) REFERENCES `Address`(`AddressID`) ON DELETE SET NULL
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
`Make` VARCHAR(31) NOT NULL ,
`Model` VARCHAR(31) NOT NULL , 
`Color` VARCHAR(15) NOT NULL , 
`MaxCapacity` INT NOT NULL ,
PRIMARY KEY (`VehicleID`),
FOREIGN KEY (`OwnerUser`) REFERENCES `User`(`UserID`) ON DELETE SET NULL
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
`SeatsLeft` INT NULL ,
  /* DaysOfWeek should be a bitstring,
  e.g. 0111110 means Monday-Friday,
  0101010 means Monday, Wednesday, Friday.*/
`DaysOfWeek` VARCHAR(7) NOT NULL,
PRIMARY KEY (`RouteID`),
FOREIGN KEY (`Vehicle`) REFERENCES `Vehicle`(`VehicleID`) ON DELETE CASCADE,
FOREIGN KEY (`FromAddress`) REFERENCES `Address`(`AddressID`) ON DELETE CASCADE,
FOREIGN KEY (`ToAddress`) REFERENCES `Address`(`AddressID`) ON DELETE CASCADE
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`PassengerToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`) ON DELETE CASCADE,
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`RouteID`) ON DELETE CASCADE
)
ENGINE = InnoDB;

CREATE TABLE `Group7Vanpool`.`DriverToRoutes` (
`UserID` INT NOT NULL , 
`RouteID` INT NOT NULL , 
PRIMARY KEY (`UserID`, `RouteID`) ,
FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`) ON DELETE CASCADE,
FOREIGN KEY (`RouteID`) REFERENCES `Route`(`RouteID`) ON DELETE CASCADE
)
ENGINE = InnoDB;
