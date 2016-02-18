<?php
    // Error reporting, and display errors on page
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
 ?>

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
    p.err {
        color: #FA8258;
    }
    h2.password {
        color: #088A08;
    }
    </style>

    <?php
        require('logic.php');
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

    <div class="page-header">
        <h1 class="text-center">xkcd Password Generator</h1>
    </div>
    <div class="container-fluid bg-1 text-center">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form role="form" method="get" action="index.php">
                    <div class='panel panel-primary'>
                        <div class="panel-heading">
                            <h3 class="panel-title">Options</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for='number_of_words'>Number of Words</label>
                                <input maxlength="1" type='text' class="form-control" name='number_of_words' id='number_of_words' value='<?php $number_of_words ?>'> (Max 9)
                            </div>
                            <div class="checkbox">
                                <input type='checkbox' name='add_number' id='add_number' value='Yes'>
                                <label for='add_number'>Add a number</label>
                            </div>
                            <div class="checkbox">
                                <input type='checkbox' name='add_symbol' id='add_symbol' value='Yes'>
                                <label for='add_symbol'>Add a symbol</label>
                            </div>
                        </div>
                    </div>

                    <input type='submit' class='btn btn-success' value='SUBMIT'>
                    <div>
                        <h2 class='password'><?php xkcd_password_generator(); ?></h2>
                    </div>
                    <div class='error'>
                        <p class="err"><?php error_message(); ?></p>
                    </div>
                </form>
                <br>
                <p class='details'>
                    <a href='http://xkcd.com/936/'>
                        <img class='img-responsive' src='http://imgs.xkcd.com/comics/password_strength.png' alt='xkcd style passwords'>
                    </a>
                    <br>
                </p>
            </div>
        </div>
    </div>

    <hr>
    <footer class="footer">
      <div class="container-fluid text-center">
        <p class="text-muted">daisy@dynamic web application</p>
      </div>
    </footer>

</body>
</html>
