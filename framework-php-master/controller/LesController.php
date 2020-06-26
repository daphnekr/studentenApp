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
	$tijd1 = $_POST['tijd-start'];
	$tijd2 = $_POST['tijd-eind'];
	$leraar = $_POST['leraar'];
	
	createTime($tijd1, $tijd2);
	newLes($les, $tijd1, $tijd2, $leraar);
	$tijden = getTime();
	$planning = getPlanning();
	render("planning/agenda", ["planning" => $planning, "tijden" => $tijden]);

}

