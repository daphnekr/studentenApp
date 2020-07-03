<?php
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/HomeModel.php");


function index()
{
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}
function loginStudent()
{
	render("home/loginStudent");
}
function checkStudent()
{
	$EM = sanitize($_POST['logMail']);
	$PW = sanitize(md5($_POST['logPass']));

	loadStudent($EM, $PW);
	index();
}
function registerStudent()
{
	$groups = getAllGroups();
	render("home/registerStudent", ["groups" => $groups]);
}
function plusStudent()
{
	$VN = sanitize($_POST['regVoor']);
	$AN = sanitize($_POST['regAchter']);
	$EM = sanitize($_POST['regMail']);
	$PW = sanitize(md5($_POST['regPass']));
	$CPW = sanitize(md5($_POST['regPassConf']));
	$k_ID = sanitize($_POST['regKlas']);

	addStudent($VN, $AN, $EM, $PW, $CPW, $k_ID);
	loginStudent();
}
function logoutStudent()
{
	session_start();
	session_destroy();
	index();
}

