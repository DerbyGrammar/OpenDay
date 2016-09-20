<!DOCTYPE>
<html>
  <?php
      $servername = "localhost";
      $username = "username";
      $password = "password";
      $dbname = "dgs";
  
      $name = $_REQUEST["name"];
      $age = $_REQUEST["age"];

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
  
      if(is_null($name) != true && $age >= 0) {
        $sql = "INSERT INTO openday (Name, Age) VALUES ('$name', '$age')";
      } 
      else {
        die();
      }

      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    ?>
  <body onload="onLoad()">
    <script>
      function onLoad() {
        window.location.href = "index.html";
      }
    </script>
  </body>
</html>