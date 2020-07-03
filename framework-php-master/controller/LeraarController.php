<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/HomeModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function createLeraar()
{
	$klas = getAllGroups();
	$slb = getAllTeachers();
	$slbklas = getTeachersWithGroup();
	render("leraar/createLeraar", ["klas" => $klas, "slb" => $slb, "slbklassen" => $slbklas]);
}
function addTeacher()
{
	$VN = sanitize($_POST['voornaam']);
	$AN = sanitize($_POST['achternaam']);
	$KL = sanitize($_POST['klas']);
	newTeacher($VN, $AN, $KL);
	createLeraar();
}

function updateLeraar($id)
{
	$slb = getOneTeacher($id);
	$klas = getAllGroups();
	render("leraar/updateLeraar", ["klas" => $klas, "slb" => $slb]);
}
function modifyTeacher($id)
{
	$VN = sanitize($_POST['voornaam']);
	$AN = sanitize($_POST['achternaam']);
	$KL = sanitize($_POST['klas']);
	editTeacher($VN, $AN, $KL, $id);
	createLeraar();
}

function agendaLeraar($id)
{
	$slb = getOneTeacher($id);
	$tijden = getATime($id);
	$planning = getTeachersPlanning($id);
	render("leraar/agendaLeraar", ["tijden" => $tijden, "slb" => $slb, "planning" => $planning]);
}
