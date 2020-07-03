<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/HomeModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function createLes()
{
	$leraren = getAllTeachers();
	render("les/createLes", ["leraren" => $leraren]);
}

function addLes()
{
	$les = sanitize($_POST['les']);
	$tijd = sanitize($_POST['tijd']);
	$tijdsduur = sanitize($_POST['tijdsduur']);
	$leraar = sanitize($_POST['leraar']);
	
	createTime($tijd);
	newLes($les, $tijd, $tijdsduur, $leraar);
	$tijden = getTime();
	$planning = getPlanning();
	render("planning/agenda", ["planning" => $planning, "tijden" => $tijden]);

}

