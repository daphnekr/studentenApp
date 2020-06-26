<?php

// alle leraren ophalen uit database
function getAllTeachers(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT DISTINCT * FROM leraar");
	$stmt->execute();
	$conn = null;
	return $stmt->fetchAll();
}
// 1 leraren ophalen uit database
function getOneTeacher($data1){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT * FROM leraar WHERE leraar.id=:id");
	$stmt->bindParam(":id", $data1);
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}
// alle klassen ophalen zonder gedupliceerde namen
function getDistinctGroups(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT `slb'er_id` DISTINCT groepnaam FROM klassen ORDER BY groepnaam ASC");
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

	if($data3 != NULL){
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

function editTeacher($data1, $data2, $data3, $data4)
{
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("UPDATE leraar SET voornaam=:VN, achternaam=:AN WHERE id=:id");
	$stmt->bindParam(":VN", $data1);
	$stmt->bindParam(":AN", $data2);
	$stmt->bindParam(":id", $data4);
	$stmt->execute();

	if($data3 != NULL){
		$stmt1 = $conn->prepare("UPDATE klassen SET `slb'er_id`=:id WHERE groepnaam=:KL");
		$stmt1->bindParam(":KL", $data3);
		$stmt1->bindParam(":id", $data4);
		$stmt1->execute();
	}
	elseif($data3 == NULL){
		$stmt2 = $conn->prepare("DELETE FROM klassen WHERE `slb'er_id`=:id");
		$stmt2->bindParam(":id", $data4);
		$stmt2->execute();
	}

	$conn = null;

}