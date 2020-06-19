<?php

function getAllStudents(){
$conn = openDatabaseConnection();
 
$stmt = $conn->prepare("SELECT * FROM studenten");
$stmt->execute();
 
$conn = null;
 
return $stmt->fetchAll();
}


