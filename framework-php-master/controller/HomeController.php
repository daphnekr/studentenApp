<?php
require(ROOT . "model/HomeModel.php");

function index()
{
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}
function deleteStudent($id)
{
	$student = getStudent($id);
	render("home/deleteStudent", ['student' => $student]);
}

function destroyStudent($id){
    deleteStudentById($id);
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}

function agenda()
{
	render("home/agenda");
}
//Leraar
function createLeraar()
{
	render("home/createLeraar");
}
function updateLeraar()
{
	render("home/updateLeraar");
}
//Les
function createLes()
{
	$leraren = getAllTeachers();
	render("home/createLes", ["leraren" => $leraren]);
}

function addLes()
{
	$les = $_POST['les'];
	$tijd = $_POST['tijd'];
	$leraar = $_POST['leraar'];
	createTime($tijd);
	newLes($les, $tijd, $leraar);
	index();

}
function updateLes()
{
	render("home/updateLes");
}
//Planning
function createPlanning()
{
	render("home/createPlanning");
}
function updatePlanning()
{
	render("home/updatePlanning");
}
//Student
function createStudent()
{
	render("home/createStudent");
}
function addStudent()
{
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$EM = $_POST['mail'];
	newStudent($VN, $AN, $EM);
	index();
}
function updateStudent($id)
{
	$klas = getAllGroups();
	$student = getStudentandClass($id);
	render("home/updateStudent", ["klas" => $klas, "student" => $student]);
}
function modifyStudent($id)
{
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$EM = $_POST['mail'];
	$KL = $_POST['klas'];
	editStudent($VN, $AN, $EM, $KL, $id);
	index();
}



