<?php
  include_once('html/database/connection.php');
  include_once('html/database/list.php');
  include_once('html/includes/init.php');

  $name = htmlentities($_GET['name'], ENT_QUOTES);

  $search = getSearch($name);

  echo json_encode($search);
?>
