<?php
include 'dbconfig.php';

function searchCustomers($keyword) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM customer_records WHERE CustomerName LIKE ?');
    $stmt->execute(['%' . $keyword . '%']);
    return $stmt->fetchAll();
}

function updateCustomer($id, $name, $carModel, $mechanic, $advisor, $serviceType, $currentDate, $nextDate) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE customer_records SET CustomerName = ?, CustomerCarModel = ?, MechanicAssigned = ?, ServiceAdviserAssigned = ?, ServiceType = ?, CurrentServiceDate = ?, NextMaintenanceDate = ? WHERE CustomerID = ?');
    $stmt->execute([$name, $carModel, $mechanic, $advisor, $serviceType, $currentDate, $nextDate, $id]);
}

function deleteCustomer($id) {
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM customer_records WHERE CustomerID = ?');
    $stmt->execute([$id]);
}
