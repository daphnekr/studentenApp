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
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-secondary">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle nav">
        <i class="fas fa-lg fa-bars"></i>
    </button>
	<div class="collapse navbar-collapse nav text-left text-light" id="navbarCollapse">
		<ul class="w-100">
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a href="<?= URL ?>home/index">Home</a></li>
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a href="<?= URL ?>student/index">Students</a></li>
			<li class="d-inline pt-lg-5 pr-lg-5 pt-2 pr-2"><a href="<?= URL ?>agenda/index">Agenda</a></li>
			<li class="d-inline float-right"><a href="<?= URL ?>student/create"><i class="fas fa-user-plus"></i></a></li>
		</ul>
	</div>
	</nav>
