<?php

  class Ajax extends Controller {

    function __construct($params) {
      parent::__construct();

      require_once 'backend/models/index.class.php';
      $this -> model = new IndexModel();

      $this -> params = $params;

      if ( isset($params[0]) ) {
        if ( isset($params[1]) ) {
          $this -> ajax = strtolower($params[1]);
          $action = $params[0];
          $this -> $action($this -> ajax);
        } else {
          echo 'Podaj plik JS';
        }
      }

    }

    private function ajax($ajax) {

      if ( $this -> params[1] == 'componentOn' ) {

        $type = $_POST['type'];
        $componentId = $_POST['componentId'];

        $result = [];
        $result['type'] = $type;

        $componentQuery = $this -> model -> db -> prepare('UPDATE components SET intesity="1", conditionComponent="1" WHERE type = :type AND componentId = :componentId');
        $componentQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentQuery->execute();

        $componentSelectQuery = $this -> model -> db -> prepare('SELECT * FROM components WHERE type = :type AND componentId = :componentId');
        $componentSelectQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentSelectQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentSelectQuery->execute();

        $component = $componentSelectQuery->fetch();

        $date = date('Y-m-d H:i:s');
        $user = 'Developer Alpha';

        $logQuery = $this -> model -> db -> prepare("INSERT INTO logs VALUES(NULL, '" . $component['component'] . "', 'Changed OFF on ON (now is ON)', '$date', '$user')");
        $logQuery->execute();

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'componentOff' ) {

        $type = $_POST['type'];
        $componentId = $_POST['componentId'];

        $result = [];
        $result['type'] = $type;

        $componentQuery = $this -> model -> db -> prepare('UPDATE components SET intesity="0", conditionComponent="0" WHERE type = :type AND componentId = :componentId');
        $componentQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentQuery->execute();

        $componentSelectQuery = $this -> model -> db -> prepare('SELECT * FROM components WHERE type = :type AND componentId = :componentId');
        $componentSelectQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentSelectQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentSelectQuery->execute();

        $component = $componentSelectQuery->fetch();

        $date = date('Y-m-d H:i:s');
        $user = 'Developer Alpha';

        $logQuery = $this -> model -> db -> prepare("INSERT INTO logs VALUES(NULL, '" . $component['component'] . "', 'Changed ON on OFF (now is OFF)', '$date', '$user')");
        $logQuery->execute();

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'changeIntesity' ) {

        $type = $_POST['type'];
        $componentId = $_POST['componentId'];
        $intesity = $_POST['intesity'];

        $componentSelectQuery = $this -> model -> db -> prepare('SELECT * FROM components WHERE type = :type AND componentId = :componentId');
        $componentSelectQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentSelectQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentSelectQuery->execute();

        $component = $componentSelectQuery->fetch();

        $date = date('Y-m-d H:i:s');
        $user = 'Developer Alpha';

        $logQuery = $this -> model -> db -> prepare("INSERT INTO logs VALUES(NULL, '" . $component['component'] . "', 'Changed INTESITY: " . $component['intesity'] . " on INTESITY: " . $intesity . "', '$date', '$user')");
        $logQuery->execute();

        $componentQuery = $this -> model -> db -> prepare("UPDATE components SET intesity='$intesity' WHERE type = :type AND componentId = :componentId");
        $componentQuery->bindValue(':type', $type, PDO::PARAM_STR);
        $componentQuery->bindValue(':componentId', $componentId, PDO::PARAM_STR);
        $componentQuery->execute();

        echo json_encode('Zmieniono');

      }

    }

  }
