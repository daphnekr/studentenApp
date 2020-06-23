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
	render("home/createLes");
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
	$klas = getAllGroups();
	render("home/createStudent", ["klas" => $klas]);
}
function addStudent()
{
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$EM = $_POST['mail'];
	$KL = $_POST['klas'];
	newStudent($VN, $AN, $EM, $KL);
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



