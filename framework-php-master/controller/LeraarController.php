<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function createLeraar()
{
	$klas = getAllGroups();
	$slb = getAllTeachers();
	render("leraar/createLeraar", ["klas" => $klas, "slb" => $slb]);
}
function addTeacher()
{
	$VN = $_POST['voornaam'];
	$AN = $_POST['achternaam'];
	$KL = $_POST['klas'];
	newTeacher($VN, $AN, $KL);
	createLeraar();
}
function updateLeraar($id)
{
	$slb = getOneTeacher($id);
	$klas = getAllGroups();
	render("leraar/updateLeraar", ["klas" => $klas, "slb" => $slb]);
}
