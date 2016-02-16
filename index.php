<!DOCTYPE html>
<html lang="en">
<head>
    <title>P2 - xkcd style Password Generator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    </style>

    <?php
        require 'logic.php';
    ?>

</head>
<body>
    <nav class="navbar navbar-inverse narbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://p1.jingjingzheng.me">Home</a>
            </div>
                <!-- <ul class="nav navbar-nav">
                <li class="active"><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul> -->
        </div>
    </nav>

    <div class="container-fluid bg-1 text-center">
        <h1>xkcd Password Generator</h1>

        <p class='password'><?php xkcd_password_generator(); ?></p>

        <form method="get" action="index.php">
            <p class='options'>
                <label for='number_of_words'># of Words</label>
                <input maxlength="1" type='text' name='number_of_words' id='number_of_words' value='<?php $number_of_words ?>'> (Max 9)
                <br>

                <input type='checkbox' name='add_number' id='add_number' value='Yes'>
                <label for='add_number'>Add a number</label>
                <br>
                <input type='checkbox' name='add_symbol' id='add_symbol' value='Yes'>
                <label for='add_symbol'>Add a symbol</label>
            </p>

            <input type='submit' class='btn btn-default' value='Gimme Another'>
            <div class='error'><?php error_message(); ?></div>
        </form>
        <p class='details'>
            <a href='http://xkcd.com/936/'>xkcd password strength</a><br>

            <a href='http://xkcd.com/936/'>
                <img class='comic' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
            </a>
            <br>
        </p>

    </div>
</body>
</html>
