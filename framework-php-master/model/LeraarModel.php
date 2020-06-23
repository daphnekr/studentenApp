<?php

// alle leraren ophalen uit database
function getAllTeachers(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT * FROM leraar");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}