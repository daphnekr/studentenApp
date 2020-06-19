<?php
	require(ROOT . "model/HomeModel.php");

function index()
{
	render("home/index", array(
		'student' => getAllStudents()
	));	
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
function updateStudent()
{
	render("home/updateStudent");
}



