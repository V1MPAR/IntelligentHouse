<?php

  require_once 'backend/models/control.class.php';
  $this -> model = new ControlModel();

  $componentsQuery = $this -> model -> db -> prepare('SELECT * FROM components');
  $componentsQuery->execute();

?>
<!DOCTYPE html>
<html lang="pl">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Intelligent House :: Contact</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- CSS -->
    <link href="http://192.168.0.104/IntelligentHouse/frontend/css/main.css?<?php echo time(); ?>" rel="stylesheet" />
    <link href="http://192.168.0.104/IntelligentHouse/frontend/css/slider.css?<?php echo time(); ?>" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro:700&amp;subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://192.168.0.100/IntelligentHouse/frontend/js/jquery.twbsPagination.min.js"></script>

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
            <div class="col-xs-12 col-md-4 menu-logo">
              <h1>Intelligent House</h1>
            </div>
            <div class="col-xs-12 col-md-8 menu-list hidden-xs" id="navigation">
              <ul class="list-inline">
                <li><a href="http://192.168.0.104/IntelligentHouse/control">Panel kontrolny</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/logs">Logi</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/aboutProject">O projekcie</a></li>
                <li class="current-item"><a href="http://192.168.0.104/IntelligentHouse/contact" class="current-item">Kontakt</a></li>
              </ul>
              <span id="slide-line"></span>
            </div>
            <div class="col-xs-12 col-md-8 menu-list-mobile visible-xs" id="navigation">
              <ul class="list-inline">
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/control">Panel kontrolny</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/logs">Logi</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/aboutProject">O projekcie</a></li>
                <li class="col-xs-6 current-item"><a href="http://192.168.0.104/IntelligentHouse/contact" class="current-item">Kontakt</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>

      <div class="container">

        <div class="row logs">

          <div class="col-md-12" id="contact">

            <div class="col-xs-12 col-md-6">
              <div class="contact-img">
                <img src="http://192.168.0.104/IntelligentHouse/frontend/img/intelligenthouse.jpg" alt="Intelligent House Photo" />
              </div>
            </div>

              <div class="col-xs-12 col-md-6">
                <div class="contact-header">
                  <h1>Kontakt</h1>
                </div>
                <div class="contact-type">
                  <h3>Opiekunowie projektu</h3>
                  <h3><span class="contact-name">śp. Jemielita Anita</span></h3>
                  <h3><span class="contact-name">Bartczuk Danuta</span></h3>
                  <h3>Twórca domku</h3>
                  <h3><span class="contact-name">Zych Bartosz</span> <span class="contact-mail">mail</span></h3>
                  <h3>Twórca panelu</h3>
                  <h3><span class="contact-name">Domurad Mateusz</span> <span class="contact-mail">mdomurad@tasksave.com</span></h3>
                </div>
                <div class="contact-type">
                  <h3>Lokalizacja domku</h3>
                  <h3><span class="contact-name">Zespół Szkół Nr 5 im. Unii Europejskiej w Ostrołęce, ul. Ks. F. Blachnickiego 5, 07-410 Ostrołęka</span></h3>
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
    <script src="http://192.168.0.104/IntelligentHouse/frontend/js/menu-line.js?<?php echo time(); ?>"></script>

    <script type="text/javascript">
    $(function () {
      var obj = $('#pagination-top').twbsPagination({
          totalPages: 35,
          visiblePages: 7,
          onPageClick: function (event, page) {
              $('#page-content').text('Page ' + page);
          }
      });
    });
    </script>

  </body>
</html>
