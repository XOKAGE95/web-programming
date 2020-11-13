<!doctype html>
<html lang="ru">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--Ссылка для значков -->
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
	  body { background: url(background1.jpg); }
	</style>
	  <link rel="shortcut icon" href="Favikon.png">
	<link rel="stylesheet" href="icon.css">
	<title> Вход </title>

  
  </head>

  <body style="color:#ffffff">

	<?php
	  session_start();
	?>
	<?php
	$user = '';
	$pass = '';


	if(isset($_SESSION['user']))
	{
		header("Location: profile.php");
		exit;
	}

	if(isset($_POST['OK']))
	{

		$user = $_POST['login'];
		$pass = $_POST['password'];

	$link = mysqli_connect("localhost", "admin", "danilstarosta", "school students"); // Подключаемся к базе данных

	$query = mysqli_query($link, "SELECT Password FROM passwords WHERE login='".$user."' LIMIT 1");
	$DB_pass = mysqli_fetch_assoc($query);

	$query = mysqli_query($link, "SELECT ID FROM passwords WHERE login='".$user."' LIMIT 1");
	$DB_id = mysqli_fetch_assoc($query);

	$query = mysqli_query($link, "SELECT FirstName, SecondName, DateOfBirthday, KLASS FROM information WHERE ID ='".$DB_id."' LIMIT 1");
	$DB_Information = mysqli_fetch_assoc($name);




	if($DB_pass['Password'] == md5($pass) )
	{
		$_SESSION['user'] = $user;
		$_SESSION['ID'] = $DB_id['ID'];
		$_SESSION['login'] = $user;

		header("Location: profile.php");
		exit;
	}
	else
	{
		header("Location: login.php");
		exit;
	}

}
?>
	<!-- Класс контейнер - для того чтобы не растягивался на всю ширину окна -->
	<div class = "container bg-dark">

	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><h3><i class="fas fa-home"> </i>  Школа </h3> </a>
		 <div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			<li class="nav-item">
			  <a class="nav-link" href="index.php">Главная<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">О нас</a>
				<div class="dropdown-menu">
				  <a class="dropdown-item" href="#">Сведения об образовательной организации</a>
				  <a class="dropdown-item" href="#">Атестация педагогов</a>
				  <a class="dropdown-item" href="#">Контакты</a>
				  <a class="dropdown-item" href="#">Обратная связь</a>
				</div>
			</li>
			<li class="nav-item active">
			  <a class="nav-link" href="login.php">Вход</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Расписание</a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Расписание звонков</a>
				<a class="dropdown-item" href="Schedule.php">Расписание уроков</a>
			  </div>
			</li> 
		  </ul>

		  <form class="form-inline my-2 my-lg-0 ml-md-auto">
		  <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Поиск">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
		  </form>
		 </div>
		</nav>
		<div class = "row-sm-12">
			<br><br><br><br><br><br><br><br><br>
		<div class = "login" style="left: 30%; bottom: 150px">
			<h3> Вход </h3>
			<br>
		  <form method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Логин</label>
				<input type="text" class="form-control" name="login">
				
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Пароль</label>
				<input type="password" class="form-control" name="password">
				<small id="emailHelp" class="form-text text-muted">Никому не сообщайте свой пароль.</small>
			</div>
			  <button type="submit" name="OK" class="btn btn-primary">Войти</button>
			</form>

			
		</div>
		</div>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>