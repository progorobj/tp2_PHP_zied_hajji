<?php

session_start();
session_regenerate_id();

    $_SESSION = array();
    session_destroy();

    header('Location: index7.php');

