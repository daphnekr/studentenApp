<?php

function newPlanning($data1, $data2)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO planning (student_id, les_id) VALUES (:student_id, :les_id)");
	$stmt->bindParam(":student_id", $data1);
	$stmt->bindParam(":les_id", $data2);
	$stmt->execute();
	
	$conn = null;
}

function getPlanning()
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM planning JOIN studenten ON planning.student_id = studenten.id JOIN lessen ON planning.les_id = lessen.id JOIN tijden ON lessen.tijd_id = tijden.tijd");
    

	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}