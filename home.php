<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "DoctorFinder"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";
$spe = $_POST['speciality'];
$query = "SELECT * FROM doctor WHERE speciality ='".$spe."' ;";

echo "<body>";
// FETCHING DATA FROM DATABASE 
$result = $conn->query($query); 

  if ($result->num_rows > 0)  
  { 
    echo"<table border='10px';color:'red';>
          <tr><th>Name</th>
              <th>Speciality</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Contact</th>
              <th>Review</th></tr>";
      // OUTPUT DATA OF EACH ROW 
      while($row = $result->fetch_assoc()) 
      { 
          echo "<tr><td>".$row["name"]."</td>
                    <td>".$row["speciality"]."</td>
                    <td>".$row["address"]."</td>
                    <td>".$row["city"]."</td>
                    <td>".$row["state"]."</td>
                    <td>".$row["contact"]."</td>
                    <td>".$row["review"]."</td></tr>"; 
      } 
    echo "</table>";
  }  
  else { 
      echo "0 results"; 
  } 
echo "<br><button onclick=myFunction()>Go back</button>
      <script>
      function myFunction(){
        window.location.href = './index.html';
      }
      </script>
      </body>";
 $conn->close(); 
?>