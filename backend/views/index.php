<!DOCTYPE html>
<html lang="pl">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>vMZK :: Home</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- CSS -->
    <link href="http://192.168.0.104/MZK/frontend/css/main.css?<?php echo time(); ?>" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro:700&amp;subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://192.168.0.104/MZK/frontend/js/date.js?<?php echo time(); ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <div id="main-container">

      <div class="container-fluid">

        <div class="row menu">

          <div class="col-xs-12">
            <div class="col-xs-4 visible-xs menu-bars">
              <i class="fa fa-bars"></i>
            </div>
            <div class="col-xs-8 col-md-4 menu-logo">
              <h1>vMZK</h1>
            </div>
            <div class="col-md-8 hidden-xs menu-list" id="navigation">
              <ul class="list-inline">
                <li class="current-item"><a href="http://192.168.0.104/MZK/" class="current-item">Home</a></li>
                <li><a href="http://192.168.0.104/MZK/timetable">Rozkład jazdy</a></li>
                <li><a href="http://192.168.0.104/MZK/about-project">O projekcie</a></li>
                <li><a href="http://192.168.0.104/MZK/contact">Kontakt</a></li>
              </ul>
              <span id="slide-line"></span>
            </div>
          </div>

        </div>

      </div>

      <div class="container">

        <div class="row articles">

          <div class="col-md-7" id="articles">
          </div>

          <div class="col-md-5 hidden-xs">
            <div class="col-xs-12 info-header">
              <h3>Data <span id="info-date"><?= date('d.m.Y'); ?></span>, <span id="info-hour"><?= date('H:i'); ?></span></h3>
            </div>

            <div class="col-xs-12 info-header">
              <h3>Zbliżające się autobusy</h3>
            </div>
            <div class="col-xs-12 info-content">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Linia</th>
                    <th>Kierunek</th>
                    <th>Odjazd</th>
                    <th>Przystanek</th>
                  </tr>
                </thead>
                <tbody id="busNear">
                </tbody>
              </table>
              <div id="busNearInfo">
                <p>Obecnie brak zbliżających się autobusów w przeciągu 5 minut</p>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="container-fluid">

        <div class="row" style="padding-top: 50px;">

          <footer class="index-footer">
            <p>Copyright © <?php echo date('Y'); ?> Mateusz Domurad</p>
          </footer>

        </div>

      </div>

    </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://192.168.0.104/MZK/frontend/js/menu-line.js?<?php echo time(); ?>"></script>
    <script src="http://192.168.0.104/MZK/frontend/js/showBusNear.js?<?php echo time(); ?>"></script>
    <script src="http://192.168.0.104/MZK/frontend/js/showArticles.js?<?php echo time(); ?>"></script>

  </body>
</html>
