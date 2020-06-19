<?php
	require(ROOT . "model/HomeModel.php");

function index()
{
	render("home/index");	
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
function updateStudent()
{
	render("home/updateStudent");
}



