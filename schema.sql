CREATE TABLE customer_records (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerName VARCHAR(255) NOT NULL,
    CustomerCarModel VARCHAR(255) NOT NULL,
    MechanicAssigned VARCHAR(255) NOT NULL,
    ServiceAdviserAssigned VARCHAR(255) NOT NULL,
    ServiceType VARCHAR(255) NOT NULL,
    CurrentServiceDate DATE NOT NULL,
    NextMaintenanceDate DATE NOT NULL
);
