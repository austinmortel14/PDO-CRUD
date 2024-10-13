<?php
include 'dbconfig.php';

if (isset($_POST['CustomerID'])) {
    $id = $_POST['CustomerID'];
    $name = $_POST['CustomerName'];
    $carModel = $_POST['CustomerCarModel'];
    $mechanic = $_POST['MechanicAssigned'];
    $advisor = $_POST['ServiceAdviserAssigned'];
    $serviceType = $_POST['ServiceType'];
    $currentDate = $_POST['CurrentServiceDate'];
    $nextDate = $_POST['NextMaintenanceDate'];

    $stmt = $pdo->prepare('UPDATE customer_records SET CustomerName = ?, CustomerCarModel = ?, MechanicAssigned = ?, ServiceAdviserAssigned = ?, ServiceType = ?, CurrentServiceDate = ?, NextMaintenanceDate = ? WHERE CustomerID = ?');
    $stmt->execute([$name, $carModel, $mechanic, $advisor, $serviceType, $currentDate, $nextDate, $id]);

    header('Location: index.php');
}
