<?php
// Step 1: Establish a database connection
$servername = "localhost"; // Change if necessary
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "user_managment";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Write SQL query to fetch customer data
$sql = "SELECT id, name, amount, createdBy FROM customers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<a href="welcome2.php">Home Page</a>
    <h1>Customers List</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Created BY</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['createdBy']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No customers found.</p>
    <?php endif; ?>
    <a href="add_customer.php">Add Customer</a>
    <?php
    // Step 3: Close the connection
    $conn->close();
    ?>

</body>
</html>
