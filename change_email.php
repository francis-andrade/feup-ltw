<?php
include_once('html/includes/init.php');
include_once('html/database/connection.php');
include_once ('html/templates/common/header.php');
        include_once('html/database/list.php');

        $expiringLists = getExpiringItems();

include_once('html/templates/aside/sidebar.php');
include_once ('html/templates/session/change_email.php');
include_once ('html/templates/common/footer.php');
?>
