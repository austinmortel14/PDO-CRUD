<?php
include 'dbconfig.php';

if (isset($_POST['CustomerID'])) {
    $id = $_POST['CustomerID'];
    $stmt = $pdo->prepare('DELETE FROM customer_records WHERE CustomerID = ?');
    $stmt->execute([$id]);
    header('Location: index.php');
}

