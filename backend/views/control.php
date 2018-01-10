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
    <style>
      #ex1Slider .slider-selection {
      	background: #BABABA;
      }
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
    <script>
    // With JQuery
      $('#ex1').slider({
      formatter: function(value) {
        return 'Current value: ' + value;
      }
      });

      // Without JQuery
      var slider = new Slider('#ex1', {
      formatter: function(value) {
        return 'Current value: ' + value;
      }
      });
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
            <div class="col-xs-12 col-md-4 menu-logo">
              <h1>Intelligent House</h1>
            </div>
            <div class="col-xs-12 col-md-8 menu-list hidden-xs" id="navigation">
              <ul class="list-inline">
                <li class="current-item"><a href="http://192.168.0.104/IntelligentHouse/control" class="current-item">Panel kontrolny</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/logs">Logi</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/about-project">O projekcie</a></li>
                <li><a href="http://192.168.0.104/IntelligentHouse/contact">Kontakt</a></li>
              </ul>
              <span id="slide-line"></span>
            </div>
            <div class="col-xs-12 col-md-8 menu-list-mobile visible-xs" id="navigation">
              <ul class="list-inline">
                <li class="current-item col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/control" class="current-item">Panel kontrolny</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/logs">Logi</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/about-project">O projekcie</a></li>
                <li class="col-xs-6"><a href="http://192.168.0.104/IntelligentHouse/contact">Kontakt</a></li>
              </ul>
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
                      <?php if ( $component['conditionComponent'] == 0 ) { ?>
                        <p id="<?= $component['type']; ?><?= $component['componentId']; ?>condition" class="off">Wyłączony</p>
                      <?php } elseif ( $component['conditionComponent'] == 1 ) { ?>
                        <p id="<?= $component['type']; ?><?= $component['componentId']; ?>condition" class="on">Włączony</p>
                        <?php if ( $component['type'] != 'door' ) { ?>
                        <p id="<?= $component['type']; ?><?= $component['componentId']; ?>intesity">Moc: <?= $component['intesity']; ?></p>
                        <?php } ?>
                      <?php } ?>
                      <p id="<?= $component['type']; ?><?= $component['componentId']; ?>intesity"></p>
                    </div>
                    <div class="component-buttons">
                      <?php if ( $component['conditionComponent'] == 0 ) { ?>
                        <input type="range" min="1" max="11" value="<?= $component['intesity']; ?>" class="component-range" id="<?= $component['type'] . $component['componentId'] . 'range'; ?>" style="display: none;" />
                        <button class="btn btn-success" id="<?= $component['type']; ?><?= $component['componentId']; ?>on">Włącz</button>
                        <button class="btn btn-danger" id="<?= $component['type']; ?><?= $component['componentId']; ?>off" style="display: none;">Wyłącz</button>
                      <?php } elseif ( $component['conditionComponent'] == 1 && $component['type'] != 'door' ) { ?>
                        <input type="range" min="1" max="11" value="<?= $component['intesity']; ?>" class="component-range" id="<?= $component['type'] . $component['componentId'] . 'range'; ?>" />
                        <button class="btn btn-danger" id="<?= $component['type']; ?><?= $component['componentId']; ?>off">Wyłącz</button>
                        <button class="btn btn-success" id="<?= $component['type']; ?><?= $component['componentId']; ?>on" style="display: none;">Włącz</button>
                      <?php } elseif ( $component['conditionComponent'] == 1 && $component['type'] == 'door' ) { ?>
                        <button class="btn btn-danger" id="<?= $component['type']; ?><?= $component['componentId']; ?>off">Wyłącz</button>
                        <button class="btn btn-success" id="<?= $component['type']; ?><?= $component['componentId']; ?>on" style="display: none;">Włącz</button>
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

    <script>
    <?php
      $componentsQuery = $this -> model -> db -> prepare('SELECT * FROM components');
      $componentsQuery->execute();

        if ( $componentsQuery->rowCount() > 0 ) {
          while ( $component = $componentsQuery->fetch() ) {
    ?>
      $('<?= '#' . $component['type'] . $component['componentId'] . 'on'; ?>').on('click', function(){
        var component = '<?= $component['type']; ?>';
        var componentId = <?= $component['componentId']; ?>;
        $.ajax({
          type: "POST",
          url: "http://192.168.0.104/IntelligentHouse/ajax/componentOn",
          dataType : 'json',
          data: {
              ajax : 'componentOn',
              type : component,
              componentId : componentId
          },
          success: function(json) {
            $('#<?= $component['type'] . $component['componentId'] . 'on'; ?>').hide();
            $('#<?= $component['type'] . $component['componentId'] . 'off'; ?>').show();
            $('#<?= $component['type']; ?><?= $component['componentId']; ?>condition').removeClass('off').html('Włączony').addClass('on');
            if ( json.type != 'door' ) {
              $('#<?= $component['type'] . $component['componentId'] . 'range'; ?>').show().attr('value', 1);
              $('#<?= $component['type']; ?><?= $component['componentId']; ?>intesity').show().html('Moc: 1');
            }
          },
          complete: function() {
          },
          error: function() {
          }
        });
      });

      $('<?= '#' . $component['type'] . $component['componentId'] . 'off'; ?>').on('click', function(){
        var component = '<?= $component['type']; ?>';
        var componentId = <?= $component['componentId']; ?>;
        $.ajax({
          type: "POST",
          url: "http://192.168.0.104/IntelligentHouse/ajax/componentOff",
          dataType : 'json',
          data: {
              ajax : 'componentOff',
              type : component,
              componentId : componentId
          },
          success: function(json) {
            $('#<?= $component['type'] . $component['componentId'] . 'on'; ?>').show();
            $('#<?= $component['type'] . $component['componentId'] . 'off'; ?>').hide();
            $('#<?= $component['type']; ?><?= $component['componentId']; ?>condition').removeClass('on').html('Wyłączony').addClass('off');
            if ( json.type != 'door' ) {
              $('#<?= $component['type'] . $component['componentId'] . 'range'; ?>').attr('value', 0).hide();
              $('#<?= $component['type']; ?><?= $component['componentId']; ?>intesity').hide().html('Moc: OFF');
            }
          },
          complete: function() {
          },
          error: function() {
          }
        });
      });

      $('<?= '#' . $component['type'] . $component['componentId'] . 'range'; ?>').on('change', function(){
        var component = '<?= $component['type']; ?>';
        var componentId = <?= $component['componentId']; ?>;
        var value = $(this).val();
        $('#<?= $component['type']; ?><?= $component['componentId']; ?>intesity').show().html('Moc: ' + value + '');
        $(this).attr('value', value);
        $.ajax({
          type: "POST",
          url: "http://192.168.0.104/IntelligentHouse/ajax/changeIntesity",
          dataType : 'json',
          data: {
              ajax : 'changeIntesity',
              type : component,
              componentId : componentId,
              intesity : value
          },
          success: function(json) {

          },
          complete: function() {
          },
          error: function() {
          }
        });
      });
    <?php
          }
        }
    ?>
    </script>

  </body>
</html>
