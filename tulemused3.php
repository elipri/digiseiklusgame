<?php   
  require('config.php');

 //Create database connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
  $sql = "SELECT * FROM GameData ORDER BY score DESC";
  $result = $conn->query($sql);
    
  if($result->num_rows > 0 ){
    
    while($rows=$result->fetch_assoc()){
      echo "<div class='results'>";
      echo "<p>" .$rows['username'] . "</p>";
      echo "<hr>";
      echo "<p>" . $rows['score'] ."</p>";
      echo "</div>";
    }
    
  } 
  else{
    echo "Tulemusi veel pole, mida kuvada";
  }
  $conn->close();                 
?> 