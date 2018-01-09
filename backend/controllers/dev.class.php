<?php

  class Dev extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/dev.class.php';
      $this -> model = new DevModel();

      $this -> params = $params;

      if ( isset($params[0]) ) {
        if ( isset($params[1]) ) {
          $action = $params[1];
          $this -> method = strtolower($params[1]);
          $this -> $action($this -> method);
        } else {
          echo 'Type developer method';
        }
      }

      $this -> view -> method = $params[1];
      $this -> view -> controller = 'dev';
      $this -> view -> render();

    }

    public function showComponents() {

      // Select Components for showComponents\

        $componentsQuery = $this -> model -> db -> prepare('SELECT * FROM components');
        $componentsQuery->execute();

        if ( $componentsQuery->rowCount() > 0 ) {
          while ( $component = $componentsQuery->fetch() ) {
            echo '<p>' . $component['component'] . 'INTESITY:' . $component['intesity'] . 'K</p>';
          }
        }

      // End

    }

  }
