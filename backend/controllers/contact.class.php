<?php

  class Contact extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/contact.class.php';
      $this -> model = new ContactModel();

      $this -> params = $params;

      $this -> view -> controller = 'contact';
      $this -> view -> render();

    }

  }
