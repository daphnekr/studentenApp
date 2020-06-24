<?php

// alle leraren ophalen uit database
function getAllTeachers(){
	$conn = openDatabaseConnection();

<<<<<<< HEAD
	$stmt = $conn->prepare("SELECT leraar.*, klassen.* FROM leraar LEFT OUTER JOIN klassen ON leraar.id = klassen.`slb'er_id`");
	$stmt->execute();
	$conn = null;
	return $stmt->fetchAll();
}
// 1 leraren ophalen uit database
function getOneTeacher($data1){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT leraar.*, klassen.groepnaam AS klas FROM leraar JOIN klassen ON klassen.`slb'er_id` = leraar.id WHERE leraar.id=:id");
	$stmt->bindParam(":id", $data1);
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}
// alle klassen ophalen zonder gedupliceerde namen
function getDistinctGroups(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT `slb'er_id` DISTINCT groepnaam FROM klassen ORDER BY groepnaam ASC");
=======
	$stmt = $conn->prepare("SELECT * FROM leraar ORDER BY achternaam");
>>>>>>> master
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

	$stmt1 = $conn->prepare("SELECT * FROM klassen WHERE groepnaam=:KL");
	$stmt1->bindParam(":KL", $data3);
	$stmt1->execute();
	$result = $stmt1->fetchAll();

	if($result == false)
	{
		$stmt2 = $conn->prepare("INSERT INTO klassen (groepnaam, `slb'er_id`) VALUES (:KL, (SELECT id FROM leraar WHERE voornaam=:VN))");
		$stmt2->bindParam(":VN", $data1);
		$stmt2->bindParam(":KL", $data3);
		$stmt2->execute();
	}

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
