<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/HomeModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function deleteStudent($id)
{
	$student = getStudent($id);
	render("student/deleteStudent", ['student' => $student]);
}

function destroyStudent($id){
	deleteStudentById($id);
	session_start();
	session_destroy();
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}

function updateStudent($id)
{
	$klas = getAllGroups();
	$student = getStudent($id);
	render("student/updateStudent", ["klas" => $klas, "student" => $student]);
}
function modifyStudent($id)
{
	$VN = sanitize($_POST['voornaam']);
	$AN = sanitize($_POST['achternaam']);
	$EM = sanitize($_POST['mail']);
	$KL = sanitize($_POST['klas']);
	editStudent($VN, $AN, $EM, $KL, $id);
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}
function detailStudent($id, $klas_id)
{
	$student = getStudent($id);
	$student_planning = getPlanningStudent($klas_id);
	render("student/detailStudent", ["student" => $student, "planning" => $student_planning]);
} 

function detailsKlas($id)
{
	$studenten = getStudentsFromGroup($id);
	$group = getGroup($id);
	render("student/detailsKlas", ["studenten" => $studenten, "klas" => $group]);
}