<?php

  class Index extends Controller {

    function __construct($params) {
      parent::__construct();
      $this -> view -> controller = 'index';
      $this -> view -> render();
    }

  }
