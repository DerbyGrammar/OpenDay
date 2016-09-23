<!DOCTYPE>
<html>
  <?php
      $servername = "localhost";
      $username = "username";
      $password = "password";
      $dbname = "dgs";
  
      $name = $_REQUEST["name"];
      $age = $_REQUEST["age"];
      $yeargroup = $_REQUEST["year"];

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          echo "If you are seeing this message, please inform Chris Nethercott<br><br>";

          die("Connection failed: " . $conn->connect_error);
      
      } 

      $sql = "INSERT INTO openday (Name, Age, Year_Group)
      VALUES ('$name', '$age', '$yeargroup')";

      if ($conn->query($sql) === TRUE) {
          echo "Added you to the database";
          echo "<script>document.location.href = 'index.html';</script>";

      } else {
          echo "If you are seeing this message, please inform Chris Nethercott<br><br>";
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    ?>
</html>