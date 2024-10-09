<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CarFormance</title>
	<style>
		body { 
			font-family: "Aptos";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h3>Welcome to the CarFormance, a car business. Input your details below</h3>

    <!-- This area is for EMPLOYEES ONLY -->

	<form action="core/handleForms.php" method="POST">
		<p><label for="Customer">Customer</label> <input type="text" name="Customer"></p>
		<p><label for="CarModel">Car Model</label> <input type="text" name="CarModel"></p>
		<p><label for="Mechanic">Mechanic</label> <input type="text" name="Mechanic"></p>
        <p><label for="ServiceAdviser">Service Adviser</label> <input type="text" name="Mechanic"></p>
		<p><label for="ServiceType">service Type</label> <input type="text" name="ServiceType"></p>
		<p><label for="NextMaintenance">Next Maintenance</label> <input type="text" name="NextMaintenance"></p>
		<p><label for="Clearance">Clearance</label> <input type="text" name="Clearance"></p>
			<input type="submit" name="insertNewStudentBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>CarCustomerID</th>
	    <th>CustomerName</th>
	    <th>CarModel</th>
	    <th>Mechanic</th>
        <th>ServiceAdviser</th>
	    <th>ServiceType</th>
	    <th>NextMaintenance</th>
	    <th>Clearance</th>
	    <th>ServiceDate</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllCustomerRecords = seeAllCustomerRecords($pdo); ?>
	  <?php foreach ($seeAllCustomerRecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['CarCustomerID']; ?></td>
	  	<td><?php echo $row['Customer_name']; ?></td>
	  	<td><?php echo $row['Car_model']; ?></td>
	  	<td><?php echo $row['Mechanic_assigned']; ?></td>
        <td><?php echo $row['Service_adviser']; ?></td>
	  	<td><?php echo $row['Service_type']; ?></td>
	  	<td><?php echo $row['Next_maintenance']; ?></td>
	  	<td><?php echo $row['Service_date']; ?></td>
	  	<td>
	  		<a href="editcustomer.php?Customer_id=<?php echo $row['Customer_id'];?>">Edit</a>
	  		<a href="deletecustomer.php?Customer_id=<?php echo $row['Customer_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>
</body>
</html>