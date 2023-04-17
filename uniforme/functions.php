<?php
    $mysqli = new mysqli('localhost', 'root','','uniforme') or die($mysqli->connect_error);

    session_start();

    if (!isset($_SESSION['items'])) {
        $_SESSION['items'] = array();
    }
    
    // Funkcija za dodavanje novog elementa u niz
    function dodajElement($id, $velicina) {
        // Ako već postoji element s ovim id-jem i veličinom u nizu, ne dodajte ga ponovo
        foreach ($_SESSION['items'] as $item) {
            if ($item['id'] == $id && $item['velicina'] == $velicina) {
                return;
            }
        }
    
        // Dodavanje novog elementa u niz
        $_SESSION['items'][] = array('id' => $id, 'velicina' => $velicina);
    }
    
    function ukloniElement($index) {
        unset($_SESSION['items'][$index]);
    }

    // Funkcija za uklanjanje elementa iz niza na osnovu njegovog indek
    function ukloniElementPoIdIVelicini($id, $velicina) {
        foreach ($_SESSION['items'] as $index => $item) {
            if ($item['id'] == $id && $item['velicina'] == $velicina) {
                ukloniElement($index);
                return;
            }
        }
    }
?>