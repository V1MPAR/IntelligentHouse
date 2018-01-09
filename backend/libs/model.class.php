<?php

  class Model {

    function __construct() {

      $config = [
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db' => 'ihproj'
      ];

      try {

        $this -> db = new PDO("mysql:host={$config['host']};dbname={$config['db']};charset=utf8", $config['user'], $config['pass'], [
          PDO::ATTR_EMULATE_PREPARES => false,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

      } catch (PDOException $error) {
        exit('Database Error');
      }

    }

  }
