<?php

  class Control extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/control.class.php';
      $this -> model = new ControlModel();

      $this -> view -> controller = 'control';
      $this -> view -> render();
    }

  }
