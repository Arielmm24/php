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
session_start();

$username = $_SESSION['username'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $amount = $_POST['amount'];

    // Validate the amount (you can add more validation as needed)
    if (!is_numeric($amount)) {
        echo "Please enter a valid amount.";
    } else {
        // Prepare the SQL statement
        $sql = "INSERT INTO customers (name, amount, createdBy) VALUES (?, ?, ?)";

        // Prepare and bind
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sds", $name, $amount, $username);  // "s" for string, "d" for decimal (double)

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: homepage.php");
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer</title>
</head>
<body>

    <h2>Add New Customer</h2>

    <form method="POST" action="add_customer.php">
        <label for="name">Customer Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>
        <br><br>

        <button type="submit">Add Customer</button>
    </form>

</body>
</html>
