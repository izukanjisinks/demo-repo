<?php 

  $db_server = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "employees";

  $conn = "";

  
  try{
    $conn = mysqli_connect($db_server,$db_user,$db_password,$db_name);
  
  }catch(mysqli_sql_exception){
    echo "could not connect <br>";
  }
  if($conn){
    echo "you are connected <br>";
  }

  // Query the database
    $sql = "SELECT * FROM employees"; // Replace 'employees' with your actual table name
    $result = mysqli_query($conn, $sql);

  
// Check if there are results
if (mysqli_num_rows($result) > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date Hired</th>
            </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['hire_date']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

// Close the connection
mysqli_close($conn);

?>