<?php

session_start();

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello  <?php echo htmlspecialchars($username); ?> </h1>
    <div>

    <a href="homepage.php">Show Customers</a>
    <a href="logout.php">Logout</a>
    </div>

</body>
</html>