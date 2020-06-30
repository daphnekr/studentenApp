<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function agenda()
{
	$tijden = getTime();
	$planning = getPlanning();
	render("planning/agenda", ["planning" => $planning, "tijden" => $tijden]);
}

function createPlanning()
{
	$klassen = getAllGroups();
	$lessen = getAllClasses();
	render("planning/createPlanning", ["klassen" => $klassen, "lessen" => $lessen]);	

}
function addPlanning()
{
	$groep = $_POST['groepNaam'];
	$les = $_POST['les'];
	$datum = $_POST['datum'];
	createDatum($datum);
	$result = checkPlanning($groep, $les, $datum);
	if ($result){
		$error = "Deze groep is al ingepland bij deze les";
		$klassen = getAllGroups();
		$lessen = getAllClasses();
		render("planning/createPlanning", ["klassen" => $klassen, "lessen" => $lessen, "error" => $error]);	
	}
	else{
		newPlanning($groep, $les, $datum);
		agenda();
	}

}
function updatePlanning($id)
{
	$les = getLesById($id);
	$leraren = getAllTeachers();
	render("planning/updatePlanning", ["les" => $les, "leraren" => $leraren]);
}
function modifyPlanning($id)
{
	$les = $_POST['les'];
	$tijd = $_POST['tijd'];
	$leraar = $_POST['leraar'];
	createTime($tijd);
	editPlanning($les, $tijd, $leraar, $id);
	agenda();
}  

function deletePlanning($id)
{
	$planning = getPlanningById($id);
	render("planning/deletePlanning", ['planning' => $planning]);
}

function destroyPlanning($id){
    deletePlanningById($id);
	agenda();
}