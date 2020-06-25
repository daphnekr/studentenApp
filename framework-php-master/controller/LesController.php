<?php
require(ROOT . "model/LesModel.php");
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
	$les = $_POST['les'];
	$tijd = $_POST['tijd'];
	$leraar = $_POST['leraar'];
	createTime($tijd);
	newLes($les, $tijd, $leraar);
	$tijden = getTime();
	$planning = getPlanning();
	render("planning/agenda", ["planning" => $planning, "tijden" => $tijden]);

}

