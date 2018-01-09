<?php

  class View {

    function __construct() {

    }

    public function render() {
      require_once 'backend/views/' . $this -> controller . '.php';
    }

  }
