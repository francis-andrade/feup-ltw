<?php
    include_once('html/includes/init.php');
    include_once('html/database/connection.php');
    include_once('html/templates/common/header.php');
	include_once('utils.php');

    if (isset($_SESSION['username']) && $_SESSION['username'] != '') {
		if(isset($_GET['msg'])){
			if($_GET['msg'] === '3')
				phpAlert('You do not have access to that list');
		}
        include_once('html/database/list.php');
        $lists = getAllLists();
        $expiringItems = getExpiringItems();
        $expiredItems = getExpiredItems();
        $listsAssociated = getListsAssociated();
        $categories = getAllCategories();
        include_once('html/templates/aside/sidebar.php');
        include_once('html/templates/lists/lists.php');
    } else {
		$username="";
		if(isset($_GET['username']))
			$username=$_GET['username'];

		if(isset($_GET['msg'])){
			if($_GET['msg'] === '1')
				phpAlert('That username does not exist');
			else if($_GET['msg'] === '2')
				phpAlert('The password is incorrect');
			
		}

        include_once('html/templates/session/login.php');
    }

    include_once('html/templates/common/footer.php');
?>
