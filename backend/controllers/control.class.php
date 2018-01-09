<?php

  class Control extends Controller {

    function __construct($params) {
      parent::__construct();
      $this -> view -> controller = 'control';
      $this -> view -> render();
    }

  }
