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
    <title> Расписание </title>
  </head>

<body style="color:#ffffff">
      <?php 
        session_start();
        $Name = 'Вход';
        if(isset($_SESSION['user'])) 
          {
            $Name = $_SESSION['login'];
          }
      ?>
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
            <li class="nav-item">
              <a class="nav-link" href="login.php"><?php echo $Name;?></a>
            </li>
            <li class="nav-item dropdown active">
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

      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class ="row">
          <div class = "col-sm-4">
              <div class="iconblock-6">
                <h3>11 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary">11A</button>
                    <button type="button" class="btn btn-secondary">11Б</button>
                    <button type="button" class="btn btn-secondary">11В</button>
                  </div></h3>
            </div>
          </div>
          <div class = "col-sm-4">
            <div class="iconblock-6">
                <h3>10 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">10A</button>
                  <button type="button" class="btn btn-secondary">10Б</button>
                  <button type="button" class="btn btn-secondary">10В</button>
                 </div></h3>
          </div>
        </div>

          <div class = "col-sm-4">
                          <div class="iconblock-6">
                <h3>9 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">9A</button>
                  <button type="button" class="btn btn-secondary">9Б</button>
                  <button type="button" class="btn btn-secondary">9В</button>
                </div></h3>
              </div>
          </div>
        </div>
      </div>
        <div class="col-sm-6">

              <div class="iconblock-6">
                <h3>8 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">8A</button>
                  <button type="button" class="btn btn-secondary">8Б</button>
                  <button type="button" class="btn btn-secondary">8В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>7 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">7A</button>
                  <button type="button" class="btn btn-secondary">7Б</button>
                  <button type="button" class="btn btn-secondary">7В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>6 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">6A</button>
                  <button type="button" class="btn btn-secondary">6Б</button>
                  <button type="button" class="btn btn-secondary">6В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>5 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">5A</button>
                  <button type="button" class="btn btn-secondary">5Б</button>
                  <button type="button" class="btn btn-secondary">5В</button>
                </div></h3>
              </div>
            </div>
            <div class = "col-sm-6">
              <div class="iconblock-6">
                <h3>4 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">4A</button>
                  <button type="button" class="btn btn-secondary">4Б</button>
                  <button type="button" class="btn btn-secondary">4В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>3 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">3A</button>
                  <button type="button" class="btn btn-secondary">3Б</button>
                  <button type="button" class="btn btn-secondary">3В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>2 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">2A</button>
                  <button type="button" class="btn btn-secondary">2Б</button>
                  <button type="button" class="btn btn-secondary">2В</button>
                </div></h3>
              </div>

              <div class="iconblock-6">
                <h3>1 классы
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary">1A</button>
                  <button type="button" class="btn btn-secondary">1Б</button>
                  <button type="button" class="btn btn-secondary">1В</button>
                </div></h3>
              </div>

            </div>


        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>