<?php
    include_once('html/includes/init.php');
    include_once('html/database/list.php');
    $date = date("Y-m-d");
    addList($_POST['title'], $_POST['description'], $date);
    header('Location: index.php');

?>
