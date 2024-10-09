SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `CarFormance` (
  `CarCustomerID` int(11) NOT NULL,             -- Customer ID 
  `CustomerName` varchar(100) DEFAULT NULL,     -- Customer name()
  `CarModel` varchar(100) DEFAULT NULL,         -- Car Make and Model
  `Mechanic` varchar(100) DEFAULT NULL,         -- Assigned Mechanic
  `ServiceAdviser` varchar(100) DEFAULT NULL,   -- Assigned Service Adviser
  `ServiceType` varchar(100) DEFAULT NULL,      -- Type of service being done 
  `NextMaintenance` varchar(100) DEFAULT NULL,  -- Next maintenance schedule
  `Clearance` tinyint(1) DEFAULT NULL,          -- Clearance for vehicle exit
  `ServiceDate` timestamp NOT NULL DEFAULT current_timestamp()    -- Current Service Date for vehicle 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `CarFormance`
  ADD PRIMARY KEY (`CarCustomerID`);
  
  ALTER TABLE `CarFormance`
  MODIFY `CarCustomerID` int(11) NOT NULL AUTO_INCREMENT;