<?php

function newPlanning($data1, $data2, $data3)
{
	$conn = openDatabaseConnection();
	
	$stmt = $conn->prepare("INSERT INTO planning (klas_id, les_id, datum_id) VALUES (:klas_id, :les_id,(SELECT id FROM datum WHERE datum=:datum_id))");
	$stmt->bindParam(":klas_id", $data1);
	$stmt->bindParam(":les_id", $data2);
	$stmt->bindParam(":datum_id", $data3);
	$stmt->execute();
	
	$conn = null;
}

function getPlanning()
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT planning.id AS planning_id, planning.*, klassen.*, klassen.id AS klas_id, lessen.*, datum.*, tijden.*, leraar.* FROM planning JOIN klassen ON planning.klas_id = klassen.id 
	JOIN lessen ON planning.les_id = lessen.id
	JOIN tijden on lessen.tijd_id = tijden.id
	JOIN leraar on lessen.leraar_id = leraar.id
	JOIN datum on planning.datum_id = datum.id ORDER BY datum.datum");
    

	$stmt->execute();

	$conn = null;

	return $stmt->fetchAll();
}

function checkPlanning($klas, $les, $datum)
{
	$conn = openDatabaseConnection();
	$stmt = $conn->prepare("SELECT * FROM planning WHERE klas_id = :klas AND les_id = :les AND datum_id = (SELECT id FROM datum WHERE datum = :datum)");
	$stmt->bindParam(":klas", $klas);
	$stmt->bindParam(":les", $les);
	$stmt->bindParam(":datum", $datum);
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

function editPlanning($data1, $data2, $data3, $data4, $data5)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("UPDATE lessen SET les=:les, tijd_id=(SELECT id FROM tijden WHERE tijd=:tijd_id), tijdsduur=:tijdsduur, leraar_id=(SELECT id FROM leraar WHERE id=:leraar_id) WHERE id=:id");
	$stmt->bindParam(":les", $data1);
	$stmt->bindParam(":tijd_id", $data2);
	$stmt->bindParam(":tijdsduur", $data3);
	$stmt->bindParam(":leraar_id", $data4);
	$stmt->bindParam(":id", $data5);
    $stmt->execute();

    $conn = null;
}

function getPlanningById($id)
{
	$conn = openDatabaseConnection();

    $stmt = $conn->prepare("SELECT planning.id AS planning_id, planning.*, klassen.*, lessen.*, tijden.* FROM planning
	JOIN klassen ON planning.klas_id = klassen.id 
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

function createDatum($datum)
{
	$conn = openDatabaseConnection();
	$query1 = $conn->prepare("SELECT * FROM datum WHERE datum = :datum");
	$query1->execute([":datum" => $datum]);
	$result1 = $query1->fetch();
 
	if ($result1 == false){
		$query = $conn->prepare("INSERT INTO datum (datum) VALUES (:datum)");
		return $query->execute([":datum" => $datum]);
	}
}