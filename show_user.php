<?php
    include_once('html/includes/init.php');
    include_once('html/database/connection.php');
    include_once('html/templates/common/header.php');
    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
        include_once('html/database/list.php');
        include_once('html/database/user.php');
        $user = getUser($_SESSION['username']);
        $expiringItems = getExpiringItems();
        $expiredItems = getExpiredItems();
        include_once('html/templates/aside/sidebar.php');
        include_once('html/templates/session/show_user.php');
    } else {
        header('Location: index.php');
    }
        include_once('html/templates/common/footer.php');
?>