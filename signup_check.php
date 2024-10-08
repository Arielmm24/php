<?php
include "includes.php";
if(isset($_POST['signup']))
{
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
$email=mysqli_real_escape_string($conn,$email);
    $username=mysqli_real_escape_string($conn,$username);
    $password=mysqli_real_escape_string($conn,$password);
    $phone=mysqli_real_escape_string($conn,$phone);
$email=htmlentities($email);
    $username=htmlentities($username);
    $password=htmlentities($password);
    $phone=htmlentities($phone);
    
    $sql1="select * from users where email='$email' or username='$username'";
    $res1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res1)>0)
    {
        /* redirect to Loginform.php */
        header("Location: login.php");
    }
    else
    {
       $sql="insert into users(email,username,password,phone) values('$email','$username','$password','$phone')";
       $res=mysqli_query($conn,$sql);
       if($res)
       {
           /* redirect to Loginform.php */
           header("Location: login.php");
       }
       else
       {
           /* redirect to Loginform.php */
           header("Location: login.php");
       }
    }
}