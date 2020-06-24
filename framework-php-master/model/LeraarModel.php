<?php

// alle leraren ophalen uit database
function getAllTeachers(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT * FROM leraar ORDER BY achternaam");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}
// Maak een nieuwe docent aan
function newTeacher($data1, $data2, $data3)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO leraar (voornaam, achternaam) VALUES (:VN, :AN)");
	$stmt->bindParam(":VN", $data1);
	$stmt->bindParam(":AN", $data2);
	$stmt->execute();

	$conn = null;
}

function getTeachersWithGroup()
{
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT klassen.*, leraar.* FROM klassen JOIN leraar ON klassen.`slb'er_id` = leraar.id");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}
