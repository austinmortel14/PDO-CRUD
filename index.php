<?php
include 'dbconfig.php';

if (isset($_POST['register'])) {
    $name = $_POST['CustomerName'];
    $carModel = $_POST['CustomerCarModel'];
    $mechanic = $_POST['MechanicAssigned'];
    $advisor = $_POST['ServiceAdviserAssigned'];
    $serviceType = $_POST['ServiceType'];
    $currentDate = $_POST['CurrentServiceDate'];
    $nextDate = $_POST['NextMaintenanceDate'];

    $stmt = $pdo->prepare('INSERT INTO customer_records (CustomerName, CustomerCarModel, MechanicAssigned, ServiceAdviserAssigned, ServiceType, CurrentServiceDate, NextMaintenanceDate) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$name, $carModel, $mechanic, $advisor, $serviceType, $currentDate, $nextDate]);

    header('Location: index.php');
}

$searchKeyword = '';
if (isset($_POST['search'])) {
    $searchKeyword = $_POST['keyword'];
    $stmt = $pdo->prepare('SELECT * FROM customer_records WHERE CustomerName LIKE ?');
    $stmt->execute(['%' . $searchKeyword . '%']);
} else {
    $stmt = $pdo->query('SELECT * FROM customer_records');
}
$customers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Records</title>
    <style>
        body, table {
            font-family: 'Aptos', sans-serif;
        }
    </style>
</head>
<body>
<h1>CarFormance</h1>
<h3>A car family company</h3>

<form method="post">
    <input type="text" name="keyword" value="<?php echo htmlspecialchars($searchKeyword); ?>" placeholder="Search by customer name">
    <input type="submit" name="search" value="Search">
</form>

<h2>Register New Customer</h2>
<h3>Enter details provided with customer's CarFormance card</h3>
<form method="post">
    <label for="CustomerName">Customer Name:</label>
    <input type="text" name="CustomerName" required><br>
    <label for="CustomerCarModel">Customer Car Model:</label>
    <input type="text" name="CustomerCarModel" required><br>
    <label for="MechanicAssigned">Mechanic Assigned:</label>
    <input type="text" name="MechanicAssigned" required><br>
    <label for="ServiceAdviserAssigned">Service Adviser Assigned:</label>
    <input type="text" name="ServiceAdviserAssigned" required><br>
    <label for="ServiceType">Service Type:</label>
    <input type="text" name="ServiceType" required><br>
    <label for="CurrentServiceDate">Current Service Date:</label>
    <input type="date" name="CurrentServiceDate" required><br>
    <label for="NextMaintenanceDate">Next Maintenance Date:</label>
    <input type="date" name="NextMaintenanceDate" required><br>
    <input type="submit" name="register" value="Register Customer">
</form>

<h2>Customer Records</h2>
<table border="3">
    <tr>
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Customer Car Model</th>
        <th>Mechanic Assigned</th>
        <th>Service Adviser Assigned</th>
        <th>Service Type</th>
        <th>Current Service Date</th>
        <th>Next Maintenance Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?php echo $customer['CustomerID']; ?></td>
        <td><?php echo $customer['CustomerName']; ?></td>
        <td><?php echo $customer['CustomerCarModel']; ?></td>
        <td><?php echo $customer['MechanicAssigned']; ?></td>
        <td><?php echo $customer['ServiceAdviserAssigned']; ?></td>
        <td><?php echo $customer['ServiceType']; ?></td>
        <td><?php echo $customer['CurrentServiceDate']; ?></td>
        <td><?php echo $customer['NextMaintenanceDate']; ?></td>
        <td>
            <a href="editcustomer.php?CustomerID=<?php echo $customer['CustomerID']; ?>">Edit</a>
            <form action="deletecustomer.php" method="post" style="display:inline;">
                <input type="hidden" name="CustomerID" value="<?php echo $customer['CustomerID']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
