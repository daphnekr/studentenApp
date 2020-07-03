<?php 
// alle studenten ophalen uit database
function getAllStudents(){
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT studenten.id AS studenten_id, studenten.*, klassen.* FROM studenten JOIN klassen ON studenten.klas_id = klassen.id ORDER BY achternaam ASC");

	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

// alle klassen ophalen uit database
function getAllGroups(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT * FROM klassen ORDER BY groepnaam ASC");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

function newStudent($data1, $data2, $data3, $data4)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO studenten (voornaam, achternaam, `e-mail`, klas_id) VALUES (:VN, :AN, :EM, (SELECT id FROM klassen WHERE groepnaam=:KL))");
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
    $stmt = $conn->prepare("SELECT studenten.*, studenten.id AS studenten_id, leraar.voornaam AS leraar_VN, leraar.achternaam AS leraar_AN, klassen.*, klassen.id = klas_id FROM studenten 
	JOIN klassen ON studenten.klas_id = klassen.id
	JOIN leraar on klassen.`slb'er_id` = leraar.id WHERE studenten.id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();

    $conn = null;
 
    return $result;
 }

 function getPlanningStudent($id)
 {
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT * FROM planning
	JOIN lessen ON planning.les_id = lessen.id
	JOIN tijden ON lessen.tijd_id = tijden.id WHERE klas_id = :id ORDER BY tijden.tijd");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $conn = null;

    return $result; 
 }
// studenten verwijderen uit database met een aangegeven id
 function deleteStudentById($id){
    $conn = openDatabaseConnection();

    $stmt = $conn->prepare("DELETE FROM studenten WHERE id = :id;");

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
	$conn = null;

	return $stmt->fetch();
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

function getAllClasses(){
	$conn = openDatabaseConnection();

	$stmt = $conn->prepare("SELECT lessen.id AS lessen_id, lessen.*, tijden.* FROM lessen JOIN tijden on lessen.tijd_id = tijden.id");
	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

function getStudentsFromGroup($id)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT studenten.*, klassen.* FROM studenten
	JOIN klassen ON studenten.klas_id = klassen.id
	WHERE klassen.id = :id ORDER BY studenten.achternaam");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
	$conn = null;

	return $stmt->fetchAll();
}

function getGroup($id)
{
	$conn = openDatabaseConnection();
    $stmt = $conn->prepare("SELECT * FROM klassen WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $conn = null;
 
    return $stmt->fetch();;
}
