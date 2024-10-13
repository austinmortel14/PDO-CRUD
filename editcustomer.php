<?php
include 'dbconfig.php';

if (isset($_GET['CustomerID'])) {
    $id = $_GET['CustomerID'];
    $stmt = $pdo->prepare('SELECT * FROM customer_records WHERE CustomerID = ?');
    $stmt->execute([$id]);
    $customer = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
<form action="handlesform.php" method="post">
    <input type="hidden" name="CustomerID" value="<?php echo $customer['CustomerID']; ?>">
    <label for="CustomerName">Customer Name:</label>
    <input type="text" name="CustomerName" value="<?php echo $customer['CustomerName']; ?>"><br>
    <label for="CustomerCarModel">Customer Car Model:</label>
    <input type="text" name="CustomerCarModel" value="<?php echo $customer['CustomerCarModel']; ?>"><br>
    <label for="MechanicAssigned">Mechanic Assigned:</label>
    <input type="text" name="MechanicAssigned" value="<?php echo $customer['MechanicAssigned']; ?>"><br>
    <label for="ServiceAdviserAssigned">Service Adviser Assigned:</label>
    <input type="text" name="ServiceAdviserAssigned" value="<?php echo $customer['ServiceAdviserAssigned']; ?>"><br>
    <label for="ServiceType">Service Type:</label>
    <input type="text" name="ServiceType" value="<?php echo $customer['ServiceType']; ?>"><br>
    <label for="CurrentServiceDate">Current Service Date:</label>
    <input type="date" name="CurrentServiceDate" value="<?php echo $customer['CurrentServiceDate']; ?>"><br>
    <label for="NextMaintenanceDate">Next Maintenance Date:</label>
    <input type="date" name="NextMaintenanceDate" value="<?php echo $customer['NextMaintenanceDate']; ?>"><br>
    <input type="submit" value="Update Customer">

</body>
</html>
