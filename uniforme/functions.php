<?php
    
    $mysqli = new mysqli('localhost', 'root','','uniforme') or die($mysqli->connect_error);

    session_start();

    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if(isset($_SESSION['korpa'])) {
        $korpa = $_SESSION['korpa'];
    } else {
        $korpa = array();
    }

?>