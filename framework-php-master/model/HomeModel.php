<?php

// alle studenten ophalen uit database
function getAllStudents(){
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT studenten.id AS studenten_id, studenten.*, klassen.* FROM studenten JOIN klassen ON studenten.klas_id = klassen.id");
    

	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

// alle klassen ophalen uit database
function getAllGroups(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT * FROM klassen ORDER BY groepnaam DESC");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

function newStudent($data1, $data2, $data3, $data4)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO studenten (voornaam, achternaam, `e-mail`, `slb'er_id`, klas_id) VALUES (:VN, :AN, :EM, 1, (SELECT id FROM klassen WHERE groepnaam=:KL))");
	$stmt->bindParam(":VN", $data1);
	$stmt->bindParam(":AN", $data2);
	$stmt->bindParam(":EM", $data3);
	$stmt->bindParam(":KL", $data4);
	$stmt->execute();
	
	$conn = null;
	
}
// Haal een student op met een aangegeven id uit de database
function getStudent($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM studenten WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();

    $conn = null;
 
    return $result;
 }

 function deleteStudentById($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM planning WHERE student_id = :id; DELETE FROM studenten WHERE id = :id; ");

    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $conn = null;
 }

function getStudentandClass($id)
{
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT studenten.*, klassen.groepnaam AS klas_naam FROM studenten JOIN klassen ON studenten.klas_id = klassen.id WHERE studenten.id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();

 function createTime($tijd)
 {
	$conn = openDatabaseConnection();
    $query1 = $conn->prepare("SELECT * FROM tijden WHERE tijd = :tijd");
    $query1->execute(["tijd" => $tijd]);
    $result = $query1->fetch();
    if ($result == false){
        $query = $conn->prepare("INSERT INTO tijden (tijd) VALUES (:tijd)");
        return $query->execute(["tijd" => $tijd]);
    } 
 }

 function newLes($data1, $data2, $data3)
 {
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO lessen (les, tijd_id, leraar_id) VALUES (:les, (SELECT id FROM tijden WHERE tijd = :tijd LIMIT 1), :leraar)");
	$stmt->bindParam(":les", $data1);
	$stmt->bindParam(":tijd", $data2);
	$stmt->bindParam(":leraar", $data3);
	$stmt->execute();
	
	$conn = null;
 }

function editStudent($data1, $data2, $data3, $data4, $data5)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("UPDATE studenten SET voornaam=:VN, achternaam=:AN, `e-mail`=:EM, klas_id=(SELECT id FROM klassen WHERE groepnaam=:KL) WHERE id=:id");
	$stmt->bindParam(":VN", $data1);
	$stmt->bindParam(":AN", $data2);
	$stmt->bindParam(":EM", $data3);
	$stmt->bindParam(":KL", $data4);
    $stmt->bindParam(":id", $data5);
    $stmt->execute();

    $conn = null;
}