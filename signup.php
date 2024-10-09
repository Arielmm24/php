<?php
include "includes.php";
if(!isset($_SESSION['username']))
{
?>
<form action="Signup_check.php" method="post">
    <input type="text" name="email" placeholder="Enter your email" required>
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="phone" name="phone" placeholder="Enter your phone number" required>
    <input type="submit" value="Submit" name="signup">
</form>
<?php
}
else
{
    header("Location: index.php");
}
?>