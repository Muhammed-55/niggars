<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<html> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body> 
<?php 
session_start(); 
 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "hijazi"; 
$conn = new mysqli($servername, $username, $password, $database); 
 ?>
<?php 
 

 
if (isset($_REQUEST['User_Name']) && isset($_REQUEST['Password'])) { 
  $User_Name = stripslashes($_REQUEST['$User_Name']); 
  $User_Name= mysqli_real_escape_string($conn,$User_Name); 
 
    $Password = stripslashes($_REQUEST['Password']); 
    $Password = mysqli_real_escape_string($conn,$Password); 
 
    $query = "SELECT * FROM admins WHERE User_Name='$User_Name'"; 
    $result = mysqli_query($conn,$query); 
 
    if ($result->num_rows == 1) { 
 
        $row = mysqli_fetch_array($result); 
        $hashed_Password = $row['Password']; 
 
        if (password_verify($Password, $hashed_Password)) { 
 
            $query = "SELECT * FROM admins WHERE User_Name='$User_Name'"; 
             
            $result = mysqli_query($conn,$query); 
             
            if ($result->num_rows == 1) { 
                 
                session_start(); 
                $id = $row['id']; 
                $_SESSION['id'] = $id; 
 
                header("Location: dashboard.php?id=$id"); 
                exit(); 
            } 
        }  
 
        else { 
            header("Location: admin-login.php?error=1"); 
        exit(); 
        } 
 
    }  
     
    else { 
        header("Location: sign-in.php?error=2"); 
        exit(); 
    } 
} 
 
$conn->close(); 
?>