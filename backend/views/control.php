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

    <title>Intelligent House :: Control Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- CSS -->
    <link href="http://192.168.0.104/IntelligentHouse/frontend/css/main.css?<?php echo time(); ?>" rel="stylesheet" />
    <link href="http://192.168.0.104/IntelligentHouse/frontend/css/slider.css?<?php echo time(); ?>" rel="stylesheet" />
    <style>
    <?php
    if ( $componentsQuery->rowCount() > 0 ) {
      while ( $component = $componentsQuery->fetch() ) { ?>
        <?php echo '#' . $component['type'] . $component['componentId'] . 'intesitySlider'; ?> .slider-selection {
          background: #BABABA;
        }
    <?php
      }
    }
    ?>
    </style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Source+Sans+Pro:700&amp;subset=latin-ext" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin-ext" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://192.168.0.104/IntelligentHouse/frontend/js/bootstrap-slider.js?<?php echo time(); ?>"></script>
    <script>
      <?php
      $componentsQuery = $this -> model -> db -> prepare('SELECT * FROM components');
      $componentsQuery->execute();
      if ( $componentsQuery->rowCount() > 0 ) {
        while ( $component = $componentsQuery->fetch() ) { ?>
          $('#<?= $component['type']; ?><?= $component['componentId']; ?>intesity').slider({
            formatter: function(value) {
              return 'Obecna wartość: ' + value;
            }
          });
      <?php
        }
      }
      ?>
    </script>

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
              <h1>Intelligent House</h1>
            </div>
            <div class="col-md-8 hidden-xs menu-list" id="navigation">
              <ul class="list-inline">
                <li><a href="http://192.168.0.104/IntelligentHouse/">Home</a></li>
                <li class="current-item"><a href="http://192.168.0.104/IntelligentHouse/control" class="current-item">Panel kontrolny</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/about-project">O projekcie</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/contact">Kontakt</a></li>
              </ul>
              <span id="slide-line"></span>
            </div>
          </div>

        </div>

      </div>

      <div class="container">

        <div class="row components">

          <div class="col-md-12" id="components">
            <?php

            $componentsQuery = $this -> model -> db -> prepare('SELECT * FROM components');
            $componentsQuery->execute();

              if ( $componentsQuery->rowCount() > 0 ) {
                while ( $component = $componentsQuery->fetch() ) {
                  if ( $component['type'] == 'pump' || $component['type'] == 'door' ) { ?>
                    <div class="col-md-6 col-xs-12 component-container">
                  <?php } else { ?>
                    <div class="col-md-4 col-xs-12 component-container">
                  <?php } ?>
                    <div class="component-icon-container">
                      <?php if ( $component['type'] == 'led' ) { ?>
                      <span><i class="fa fa-lightbulb-o"></i></span>
                    <?php } elseif ( $component['type'] == 'radiator' ) { ?>
                      <span><i class="fa fa-thermometer-full" aria-hidden="true"></i></span>
                    <?php } elseif ( $component['type'] == 'pump' ) { ?>
                      <span><i class="fa fa-tint" aria-hidden="true"></i></span>
                    <?php } elseif ( $component['type'] == 'door' ) { ?>
                      <span><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                    <?php } ?>
                    </div>
                    <div class="component-name">
                      <h1><?= $component['name']; ?></h1>
                      <p><?= $component['component']; ?></p>
                      <?php if ( $component['condition'] == 0 ) { ?>
                        <p id="<?= $component['type']; ?><?= $component['componentId']; ?>condition" class="off">Wyłączony</p>
                      <?php } elseif ( $component['condition'] == 1 ) { ?>
                        <p id="<?= $component['type']; ?><?= $component['componentId']; ?>condition" class="on">Włączony</p>
                      <?php } ?>
                    </div>
                    <div class="component-buttons">
                      <?php if ( $component['condition'] == 0 ) { ?>
                        <button class="btn btn-success" id="<?= $component['type']; ?><?= $component['componentId']; ?>on">Włącz</button>
                      <?php } elseif ( $component['condition'] == 1 && $component['type'] != 'door' ) { ?>
                        <div class="well">
                          <input id="<?= $component['type']; ?><?= $component['componentId']; ?>intesity" data-slider-id='<?= $component['type']; ?><?= $component['componentId']; ?>intesitySlider' type="text" data-slider-min="0" data-slider-max="11" data-slider-step="1" data-slider-value="<?= $component['intesity']; ?>" />
                        </div>
                        <button class="btn btn-danger" id="<?= $component['type']; ?><?= $component['componentId']; ?>off">Wyłącz</button>
                      <?php } elseif ( $component['condition'] == 1 && $component['type'] != 'door' ) { ?>
                        <button class="btn btn-danger" id="<?= $component['type']; ?><?= $component['componentId']; ?>off">Wyłącz</button>
                      <?php } ?>
                    </div>
                  </div>
            <?php
                }
              }
            ?>
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
    <script src="http://192.168.0.104/IntelligentHouse/frontend/js/showBusNear.js?<?php echo time(); ?>"></script>
    <script src="http://192.168.0.104/IntelligentHouse/frontend/js/showArticles.js?<?php echo time(); ?>"></script>

  </body>
</html>
