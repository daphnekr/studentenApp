<?php
require(ROOT . "model/StudentModel.php");

function index()
{
	$students = getAllStudents();
	$groups = getAllGroups();
	render("home/index", ["students" => $students, "groups" => $groups]);	
}


