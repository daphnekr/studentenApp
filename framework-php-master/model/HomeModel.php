<?php

function getAllStudents(){
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("SELECT * FROM studenten");
	$stmt->execute();
	
	$conn = null;
	
	return $stmt->fetchAll();
}

function newStudent($data1, $data2, $data3)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO studenten (`voornaam`, `achternaam`, `e-mail`, `slb'er_id`, `klas_id`) VALUES (:VN, :AN, :EM, '1', '1')");
	$stmt->bindParam(":VN", $data1);
	$stmt->bindParam(":AN", $data2);
	$stmt->bindParam(":EM", $data3);
	$stmt->execute();
	
	$conn = null;
	
	return $stmt->fetchAll();
}


