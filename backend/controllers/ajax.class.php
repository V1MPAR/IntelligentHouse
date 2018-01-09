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

      if ( $this -> params[1] == 'showDate' ) {

        $result = [];

        $result['date'] = date('d.m.Y');
        $result['hour'] = date('H:i');

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'showBusNear' ) {

        $hour = date('H');

        $busQuery = $this -> model -> db -> prepare('SELECT * FROM routes WHERE hour = :hour');
        $busQuery->bindValue(':hour', $hour, PDO::PARAM_STR);
        $busQuery->execute();

        $result = [];

        $result['line'] = [];
        $result['route'] = [];
        $result['date'] = [];
        $result['stop'] = [];

        $rowCount = 0;

        if ( $busQuery->rowCount() > 0 ) {
          while ( $bus = $busQuery->fetch() ) {
            $busMinute = $bus['minute'] - date('i');
            if ( $busMinute <= 5 && $bus['minute'] > date('i') && $hour != 0 ) {
              array_push($result['line'], $bus['linebus']);
              array_push($result['route'], $bus['route']);
              if ( $bus['hour'] <= 9 ) {
                $hour = '0' . $bus['hour'];
              } else {
                $hour = $bus['hour'];
              }
              if ( $bus['minute'] <= 9 ) {
                $minute = '0' . $bus['minute'];
              } else {
                $minute = $bus['minute'];
              }
              array_push($result['date'], $hour . ':' . $minute);
              array_push($result['stop'], $bus['stop']);
              $rowCount++;
            }
          }
          $result['rowCount'] = $rowCount;
        } else {
          $result['info'] = 'Obecnie brak zblizajacych sie autobusow w przeciagu 5 minut';
        }

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'showArticles' ) {

        $articlesQuery = $this -> model -> db -> prepare('SELECT * FROM articles ORDER BY id DESC LIMIT 5');
        $articlesQuery->execute();

        $result = [];

        $result['title'] = [];
        $result['date'] = [];
        $result['tag'] = [];
        $result['content'] = [];
        $result['link'] = [];

        if ( $articlesQuery->rowCount() > 0 ) {
          while ( $article = $articlesQuery->fetch() ) {
            array_push($result['title'], $article['title']);
            array_push($result['date'], $article['date']);
            array_push($result['tag'], $article['tag']);
            array_push($result['content'], $article['content']);
            array_push($result['link'], $article['link']);
          }
          $result['rowCount'] = $articlesQuery->rowCount();
        } else {
          $result['info'] = 'Obecnie brak artykułów';
        }

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'showTimetable' ) {

        $line = $_POST['line'];
        $route = $_POST['subline'];

        $timeTableQuery = $this -> model -> db -> prepare('SELECT * FROM routes WHERE linebus = :linebus AND route = :route');
        $timeTableQuery->bindValue(':linebus', $line, PDO::PARAM_STR);
        $timeTableQuery->bindValue(':route', $route, PDO::PARAM_STR);
        $timeTableQuery->execute();

        $linesQuery = $this -> model -> db -> prepare('SELECT * FROM buslines WHERE linebus = :linebus');
        $linesQuery->bindValue(':linebus', $line, PDO::PARAM_STR);
        $linesQuery->execute();

        $lineInfo = $linesQuery->fetch();

        $result = [];

        $result['line'] = [];
        $result['route'] = [];
        $result['hour'] = [];
        $result['minute'] = [];
        $result['stop'] = [];
        $result['exception'] = [];
        $result['lineinfo'] = $lineInfo['info'];

        if ( $timeTableQuery->rowCount() > 0 ) {
          while ( $timetable = $timeTableQuery->fetch() ) {
            array_push($result['line'], $timetable['linebus']);
            array_push($result['route'], $timetable['route']);
            array_push($result['hour'], $timetable['hour']);
            array_push($result['minute'], $timetable['minute']);
            array_push($result['stop'], $timetable['stop']);
            array_push($result['exception'], unserialize($timetable['exception']));
          }
          $result['rowCount'] = $timeTableQuery->rowCount();
        } else {
          $result['info'] = 'Podany rozkład jest pusty';
        }

        echo json_encode($result);

      }

      if ( $this -> params[1] == 'showSubLines' ) {

        $line = $_POST['line'];

        $subLinesQuery = $this -> model -> db -> prepare('SELECT * FROM sublines WHERE linebus = :linebus');
        $subLinesQuery->bindValue(':linebus', $line, PDO::PARAM_STR);
        $subLinesQuery->execute();

        $result = [];

        $result['linebus'] = [];
        $result['route'] = [];

        if ( $subLinesQuery->rowCount() > 0 ) {
          while ( $subline = $subLinesQuery->fetch() ) {
            array_push($result['linebus'], $subline['linebus']);
            array_push($result['route'], $subline['route']);
          }
          $result['rowCount'] = $subLinesQuery->rowCount();
        } else {
          $result['info'] = 'Podany rozkład nie posiada sublinii';
        }

        echo json_encode($result);

      }

    }

  }
