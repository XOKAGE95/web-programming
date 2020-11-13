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
         a {
          text-decoration: none;
          color: gray;
        }

        a:hover {
          text-decoration: none;
          color: white;
        }
    </style>

    <link rel="shortcut icon" href="Favikon.png">
    <link rel="stylesheet" href="icon.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="picture.css">

    <title> Профиль </title>
  </head>

  <body style="color:#ffffff">

    <?php
    $Name='Вход';
    
    session_start();
    if (isset($_GET['do']) && $_GET['do'] == 'logout') {
    session_destroy();
    unset($_SESSION['user']);
    header("Location: login.php");
    exit;
    }

    if(!$_SESSION['user'])
    {
      header("Location: login.php");
      exit;
    }
    else
    {
      $Name= $_SESSION['login'];
    }

    ?>

    <?php

    //Получение информации о пользователе из БД:
    $DB_id = $_SESSION['ID'];
    $link = mysqli_connect("localhost", "admin", "danilstarosta", "school students");

    $query = mysqli_query($link, "SELECT FirstName FROM information WHERE ID ='".$DB_id."' LIMIT 1");
    $DB_FirstName = mysqli_fetch_assoc($query);
    $FirstName = $DB_FirstName['FirstName'];

    $query = mysqli_query($link, "SELECT SecondName FROM information WHERE ID ='".$DB_id."' LIMIT 1");
    $DB_SecondName = mysqli_fetch_assoc($query);
    $SecondName = $DB_SecondName['SecondName'];

    $query = mysqli_query($link, "SELECT DateOfBirthday FROM information WHERE ID ='".$DB_id."' LIMIT 1");
    $DB_DateOfBirthday = mysqli_fetch_assoc($query);
    $DateOfBirthday = $DB_DateOfBirthday['DateOfBirthday'];

    $query = mysqli_query($link, "SELECT KLASS FROM information WHERE ID ='".$DB_id."' LIMIT 1");
    $DB_KLASS = mysqli_fetch_assoc($query);
    $KLASS = $DB_KLASS['KLASS'];


    //Загрузка фотографии из БД:
    $query = mysqli_query($link, "SELECT Photo FROM photo WHERE id = $DB_id LIMIT 1");
    $row = mysqli_fetch_assoc($query);

    if($row['Photo'] != NULL)
    {
      $dbcon = mysqli_connect("localhost", "admin", "danilstarosta", "school students");
      $query = "SELECT Photo from photo WHERE ID = '".$DB_id."'";
      $mq = mysqli_query($dbcon,$query);
      $row =  mysqli_fetch_array($mq);
      $s = $row['Photo'];
    }
    else 
    {
      $s = -1;
    }

    //Форма загрузки фото в БД
    if(isset($_POST['ImageSubmit']))
    {
        $image = $_FILES['image']['tmp_name'];
        $image = addslashes(file_get_contents($image));
        saveimage($image, $DB_id);
        header('Location: profile.php#');
    }
    function saveimage($image, $DB_id){

      $dbcon = mysqli_connect("localhost", "admin", "danilstarosta", "school students");
      $query = "UPDATE photo SET Photo = '$image' where ID = '".$DB_id."'";
      $result=mysqli_query($dbcon, $query);
    }

    ?>
    <!-- Класс контейнер - для того чтобы не растягивался на всю ширину окна -->
    <div class = "container">



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
              <a class="nav-link" href="profile.php"><?php echo $Name ?></a>
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
      </nav>


      <div class="container-picture">
      
        <div class = "picture">


            <?php 
              if($s != -1)
                {
                  echo '<img src="data:image/jpeg;base64,'.base64_encode($s).'" alt="HTML5 Icon" style="width:160px">';
                }
              else
                {
                  echo'<img src="pictures/default.png" style="width:160px">';
                } 
              ?>
            <div class = "BlockButton">
              <a href="#main">
                Обновить
              </a>
            </div>

      </div>

      <br>
    
    </div>

    <div class="container-text">
    <div class="text">
      <div class="row">
        <div class="col-md-9">
          <p> ФИО: <?php echo $FirstName, ' ', $SecondName?> </p>
          <p> Класс: <?php echo $KLASS?> </p>
          <p> Эл. Дневник: <a class="link" href="#"> <?php echo $FirstName?> </a></p>
          <p> Дата рождения: <?php echo $DateOfBirthday?></p>
        </div>
        <div class="col-md-3">
          <br>
          <br>
          <br>
          <a href="profile.php?do=logout" class="btn btn-danger" role="button"> Выход </a>
        </div>
      </div>
    </div>
    </div>


    <div class="container-list">


    </div>

    <a href="#" id="main">
        <span id="okno" class="black">
          <form method="POST" enctype="multipart/form-data">Прикрепите файл:<br>
            <input type="file" name="image" id="file"/>
            <input type="submit" name="ImageSubmit" value="Загрузить" id="file" href="picture.php">
          </form>
        </span>
    </a>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>