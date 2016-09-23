<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "dgs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Name, Age, Year_Group FROM openday";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "Name: ". $row["Name"]. " | Age: ". $row["Age"]. " | Year Group: " . $row["Year_Group"] . "<br>";
     }
} else {
     echo "0 results found in the entire database";
}

$conn->close();
?>  

</body>
</html>