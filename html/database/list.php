<?php

    function getAllLists() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('SELECT * FROM todolists WHERE username = ?');
            $stmt->execute(array($_SESSION['username']));
            return $stmt->fetchAll();
        }
    }

    function getListById($listID) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('SELECT * FROM todolists WHERE listID = ? AND username = ?');
            $stmt->execute(array($listID, $_SESSION['username']));
            return $stmt->fetch();
        }
    }

    function getListItems($listID) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('SELECT * FROM listitems WHERE listID = ?');
            $stmt->execute(array($listID));
            return $stmt->fetchAll();
        }
    }

    function getExpiringItems() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $due = date("Y-m-d", strtotime("+7 day"));
            $today = date("Y-m-d");
            $stmt = $dbh->prepare('SELECT * FROM listitems WHERE assignee = ? AND date(datadue) < ? AND date(datadue) > ?');
            $stmt->execute(array($_SESSION['username'],$due,$today));
            return $stmt->fetchAll();
        }
    }

    function getExpiredItems() {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $date = date("Y-m-d");
            $stmt = $dbh->prepare('SELECT * FROM listitems WHERE assignee = ? AND date(datadue) < ?');
            $stmt->execute(array($_SESSION['username'],$date));
            return $stmt->fetchAll();
        }
    }

    function addList($title, $description, $date) {
        global $dbh;
        if (isset($_SESSION['username'])) {
            $stmt = $dbh->prepare('INSERT INTO todolists (listID, username, title, descr, creation) VALUES(?, ?, ?, ?, ?)');
            $stmt->execute(array(NULL, $_SESSION['username'],$title, $description, $date));
        }
    }
?>
