<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sobre nostros</title>
    <?php require_once './css_bootstrap.php'; ?>
    <style>.top-container {
            height: 700px;
            background-image: url("./images/chef.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: auto 100%
        }

        @media only screen and (max-width: 500px) {
            #slogan {
                width: 240px
            }

            .first-time {
                width: 100%
            }
        }

        @media only screen and (min-width: 500px) {
            .top-container {
                height: 850px
            }

            .first-time {
                width: 75%
            }
        }</style>
</head>

<body>
<?php require_once("header.php"); ?>
<div class="top-container">
    <div class="top-container position-relative">
        <div class="f-brand position-absolute start-50 top-50 translate-middle text-center">
            <h1 id="slogan" class="mb-0 text-white mb-3" style="font-size: 2.5rem;">Somos RESTAURANT</h1>
        </div>
        <p class="position-absolute bottom-0 start-50 text-white mb-4">
            <i class="fs-5 fa-solid fa-angle-down"></i>