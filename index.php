<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

//create a connection to the database

$connect_db = new mysqli($servername, $username, $password, $dbname);

if($connect_db->connect_error){
    die("Connection field"  .$connect_db->connect_error);
}


$sql_query = "SELECT * FROM employees WHERE department_id  IN (SELECT department_id FROM department WHERE department_name = 'IT')";

// Execute the SQL query
$result = $connect_db->query($sql_query);

if($result === false){
    echo "Error" .$sql_query. "<br>" .$connect_db->error;
}else{
    
    while ($row = $result->fetch_assoc()) {
        print_r($row);
        echo "<br>";
    }
   
}

$connect_db->close();
?>