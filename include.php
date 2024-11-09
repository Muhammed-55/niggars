<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body> 
<?php 
 
 $servername="localhost"; 
 $username="root"; 
 $password=""; 
 $Databaseusername="hijazi"; 
  
 $conn= new mysqli($servername,$username,$password,$Databaseusername); 
 if($conn->connect_error){
     die("failed".$conn->connect_error);
 }
 else{
     echo "";
 }
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
 
    $Your_Name = stripslashes($_REQUEST['Your_Name']); 
    $Your_Name = mysqli_real_escape_string($conn,$Your_Name); 
 
    $Your_Email = stripslashes($_REQUEST['Your_Email']); 
    $Your_Email = mysqli_real_escape_string($conn,$Your_Email); 
   
    $Your_Mobile = stripslashes($_REQUEST['Your_Mobile']); 
    $Your_Mobile = mysqli_real_escape_string($conn,$Your_Mobile); 
    
    $Choose_data = stripslashes($_REQUEST['Choose_data']); 
    $Choose_data = mysqli_real_escape_string($conn,$Choose_data);
 
    $Choose_Doctor = stripslashes($_REQUEST['Choose_Doctor']); 
    $Choose_Doctor = mysqli_real_escape_string($conn,$Choose_Doctor); 
     
    $Describe_Your_problem = stripslashes($_REQUEST['Describe_Your_problem']); 
    $Describe_Your_problem = mysqli_real_escape_string($conn,$Describe_Your_problem); 
         
    $sql = "INSERT INTO apointmant (Your_Name, Your_Email, Your_Mobile, Choose_data, Choose_Doctor,Describe_Your_problem) VALUES ('$Your_Name', '$Your_Email', '$Your_Mobile', '$Choose_data','$Choose_Doctor','$Describe_Your_problem')"; 
         
    if ($conn->query($sql) === TRUE) { 
        header("Location: service.php"); 
        
        exit(); 
    } else { 
        header("Location: service.php"); 
        exit(); 
    } 
} 
 
$conn->close(); 
?> 
</body> 
</html>