<?php
require(ROOT . "model/LesModel.php");
require(ROOT . "model/LeraarModel.php");
require(ROOT . "model/StudentModel.php");
require(ROOT . "model/PlanningModel.php");

function createLeraar()
{
	render("leraar/createLeraar");
}
function updateLeraar()
{
	render("leraar/updateLeraar");
}
