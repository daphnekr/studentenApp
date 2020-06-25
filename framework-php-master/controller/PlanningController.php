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
	$students = getAllStudents();
	$lessen = getAllClasses();
	render("planning/createPlanning", ["students" => $students, "lessen" => $lessen]);	

}
function addPlanning()
{
	$student = $_POST['studentNaam'];
	$les = $_POST['les'];
	$result = checkPlanning($student, $les);
	if ($result){
		$error = "Deze student is al ingepland bij deze les";
		$students = getAllStudents();
		$lessen = getAllClasses();
		render("planning/createPlanning", ["students" => $students, "lessen" => $lessen, "error" => $error]);
	}
	else{
		newPlanning($student, $les);
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