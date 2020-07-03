<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Studenten app</title>
	<script src="https://kit.fontawesome.com/06ea314d81.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	
	<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<?php session_start();?>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-secondary">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle nav">
        <i class="fas fa-lg fa-bars"></i>
    </button>
	<div class="collapse navbar-collapse nav text-left" id="navbarCollapse" aria-label="Button group with nested dropdown">
		<ul class="w-100 p-0 m-lg-0 mt-3 mb-0">
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a class="text-white h5" href="<?= URL ?>home/index">Home</a></li>
			<li id="btnGroupDrop1" class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2 dropdown-toggle" data-toggle="dropdown"><a class="text-white h5" >Agenda</a></li>
			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				<a class="dropdown-item" href="<?= URL ?>planning/agenda">Agenda</a>
				<a class="dropdown-item" href="<?= URL ?>planning/createPlanning">Planning maken</a>
			</div>
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a class="text-white h5" href="<?= URL ?>les/createLes">Lessen</a></li>
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a class="text-white h5" href="<?= URL ?>leraar/createLeraar">Leraren</a></li>
			<?php if(isset($_SESSION['Loggedin'])){?>
				<li class="d-inline float-right"><a class="text-white h5" href="<?= URL ?>home/logoutStudent"><i class="fas fa-sign-out-alt"></i></a></li>
				<li class="d-inline float-right pr-lg-3 pr-2"><a class = "text-danger h5" href="<?= URL?>student/deletestudent/<?= $_SESSION['userID']; ?>"><i class="fas fa-times"></i></a></li> 
                <li class="d-inline float-right pr-lg-3 pr-2"><a class = "text-primary h5" href="<?= URL?>student/updateStudent/<?= $_SESSION['userID']; ?>"><i class="fas fa-edit"></i></a></li> 
			<?php } else{?>
			<li class="d-inline float-right"><a class="text-white text-decoration-none" href="<?= URL ?>home/registerStudent"><i class="fas fa-lg fa-user-plus"></i></a></li>
			<li class="d-inline float-right pr-lg-3 pr-2"><a class="text-white h5" href="<?= URL ?>home/loginStudent"><i class="fas fa-sign-in-alt"></i></a></li>
			<?php }?>
		</ul>
	</div>
	</nav>
