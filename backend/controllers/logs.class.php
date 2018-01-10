<?php

  class Logs extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/logs.class.php';
      $this -> model = new LogsModel();

      $this -> params = $params;

      $this -> view -> controller = 'logs';
      $this -> view -> render();

    }

  }
