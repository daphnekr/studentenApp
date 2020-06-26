<?php

function newPlanning($data1, $data2)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO planning (klas_id, les_id) VALUES (:klas_id, :les_id)");
	$stmt->bindParam(":klas_id", $data1);
	$stmt->bindParam(":les_id", $data2);
	$stmt->execute();
	
	$conn = null;
}

function getPlanning()
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT planning.id AS planning_id, planning.*, klassen.*, lessen.* FROM planning JOIN klassen ON planning.klas_id = klassen.id JOIN lessen ON planning.les_id = lessen.id");
    

	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

function checkPlanning($klas, $les)
{
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM planning WHERE klas_id = :klas AND les_id = :les");
	$stmt->bindParam(":klas", $klas);
	$stmt->bindParam(":les", $les);
	$stmt->execute();
	return $stmt->fetch();
	
}

function getLesById($id)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT lessen.*, lessen.id AS les_id, tijden.*, leraar.* FROM lessen JOIN tijden ON lessen.tijd_id = tijden.id JOIN leraar ON lessen.leraar_id = leraar.id WHERE lessen.id = :id ");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();

    $conn = null;
 
    return $result;
}

function editPlanning($data1, $data2, $data3, $data4)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("UPDATE lessen SET les=:les, tijd_id=(SELECT id FROM tijden WHERE tijd=:tijd_id), leraar_id=(SELECT id FROM leraar WHERE id=:leraar_id) WHERE id=:id");
	$stmt->bindParam(":les", $data1);
	$stmt->bindParam(":tijd_id", $data2);
	$stmt->bindParam(":leraar_id", $data3);
	$stmt->bindParam(":id", $data4);
    $stmt->execute();

    $conn = null;
}

function getPlanningById($id)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT planning.id AS planning_id, planning.*, studenten.*, lessen.*, tijden.* FROM planning 
	JOIN studenten ON planning.student_id = studenten.id 
	JOIN lessen ON planning.les_id = lessen.id 
	JOIN tijden ON lessen.tijd_id = tijden.id WHERE planning.id = :id");
    
	$stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();

    $conn = null;
 
    return $result;
}

function deletePlanningById($id)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM planning WHERE id = :id");

    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $conn = null;
}