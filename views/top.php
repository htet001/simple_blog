<?php
session_start();
include_once "sysgem/Mysession.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple_Blog</title>
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/custom.css">
    <style>
    </style>
</head>

<body>

    <?php
    include_once "sysgem/Mysession.php";
    include_once "sysgem/postgenerator.php";
    include_once "views/nav.php";
    include_once "sysgem/membership.php";
    ?>