<?php
    include('connection.php');

    session_start();

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

         $_SESSION['username'] = $username;
        $sql = "select * from users where username = '$username' AND password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: welcome2.php");
        }  
        else{  
            echo  '<script>
                        window.location.href = "index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>