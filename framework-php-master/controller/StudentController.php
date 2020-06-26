<?php
require(ROOT . "model/LesModel.php");
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
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}

function createStudent()
{
	$klas = getAllGroups();
	render("student/createStudent", ["klas" => $klas]);
}
function addStudent()
{
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$EM = $_POST['mail'];
	$KL = $_POST['klas'];
	newStudent($VN, $AN, $EM, $KL);
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
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$EM = $_POST['mail'];
	$KL = $_POST['klas'];
	editStudent($VN, $AN, $EM, $KL, $id);
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}
function detailStudent($id)
{
	$student = getStudent($id);
	$student_planning = getPlanningStudent($id);
	render("student/detailStudent", ["student" => $student, "planning" => $student_planning]);
} 