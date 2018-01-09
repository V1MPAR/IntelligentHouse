<?php

  class Router {

    function __construct() {

      $this -> request = $_GET['url'];
      $this -> request = rtrim($this -> request, '/');
      $this -> params = explode("/", $this -> request);

      $this -> controller = $this -> params[0];
      if ( $this -> controller == 'index.php' ) {
        $this -> controller = 'index';
      }
      $this -> controller = strtolower($this -> controller);

      $file = 'backend/controllers/' . $this -> controller . '.class.php';
      if ( file_exists($file) ) {
        require_once $file;
        $this -> control = new $this -> controller($this -> params);
      } else {
        echo 'Nieznana metoda';
      }

    }

  }
