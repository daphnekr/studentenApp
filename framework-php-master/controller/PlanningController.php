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
	newPlanning($student, $les);
	agenda();
}
function updatePlanning()
{
	render("planning/updatePlanning");
} 