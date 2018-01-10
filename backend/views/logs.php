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

    <title>Intelligent House :: Logs</title>

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
                <li class="current-item"><a href="http://192.168.0.104/IntelligentHouse/logs" class="current-item">Logi</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/about-project">O projekcie</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/contact">Kontakt</a></li>
              </ul>
              <span id="slide-line"></span>
            </div>
            <div class="col-xs-12 col-md-8 menu-list-mobile visible-xs" id="navigation">
              <ul class="list-inline">
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/control">Panel kontrolny</a></li>
                <li class="current-item col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/logs" class="current-item">Logi</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/about-project">O projekcie</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/contact">Kontakt</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>

      <div class="container">

        <div class="row logs">

          <div class="col-md-12" id="logs">

            <ul id="pagination-top" class="pagination-sm"></ul>

            <table class="table table-striped table-responsive">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Component</th>
                  <th>Action</th>
                  <th>Date</th>
                  <th>User</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $logsQuery = $this -> model -> db -> prepare('SELECT * FROM logs');
                $logsQuery->execute();

                  if ( $logsQuery->rowCount() > 0 ) {
                    while ( $log = $logsQuery->fetch() ) {

                ?>
                <tr>
                  <td><?= $log['id']; ?></td>
                  <td><?= $log['component']; ?></td>
                  <td><?= $log['action']; ?></td>
                  <td><?= $log['date']; ?></td>
                  <td><?= $log['user']; ?></td>
                </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>

            <p class="logs-bottom">
              <ul class="pagination bootpag">

              </ul>
            </p>

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
