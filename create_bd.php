<?php
$con=mysqli_connect("localhost","root","123456","my_test");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create tables 

$sql="CREATE TABLE IF NOT EXISTS remind(
            id INT(11) AUTO_INCREMENT NOT NULL,
            title VARCHAR (100),
            text VARCHAR(100),
            date_sign DATE,
            category ENUM ('home','job','family'),
            PRIMARY KEY (id)
            )";

if (mysqli_query($con,$sql)) {
  echo "Table remind created successfully";
} else {
  echo "Error creating table: " . mysqli_error($con);
}

mysqli_query($con,"INSERT INTO remind (title, text, date_sign, category) 
VALUES ('buy', 'bread, milk, beer', '2014-04-04', 'home'),('read', 'php book ', '2014-04-05', 'job'),('congratulate', 'my mother', '2014-04-12', 'family')");

mysqli_close($con);
?>
