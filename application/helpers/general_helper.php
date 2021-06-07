<?php 

function isLogin() {
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] === "login") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function isAdmin() {
    if ($_SESSION['role'] === 'admin') {
        return true;
    } else {
        return false;
    }
}

function isSiswa() {
    if ($_SESSION['role'] === 'user') {
        return true;
    } else {
        return false;
    }
}

?>