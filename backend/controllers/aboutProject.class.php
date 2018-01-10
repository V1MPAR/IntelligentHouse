<?php

  class AboutProject extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/aboutProject.class.php';
      $this -> model = new AboutProjectModel();

      $this -> params = $params;

      $this -> view -> controller = 'aboutProject';
      $this -> view -> render();

    }

  }
