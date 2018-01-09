<?php

  ob_start();
  session_start();

  require_once 'backend/libs/router.class.php';
  require_once 'backend/libs/controller.class.php';
  require_once 'backend/libs/model.class.php';
  require_once 'backend/libs/view.class.php';

  $router = new Router();

?>
