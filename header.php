<?php
  session_start(); // Starting the session.
  date_default_timezone_set('Europe/Helsinki'); //Setting the correct timezone for the comments.
  include 'dbh.php'; //Database handler
  include 'comments.inc.php'; //Comments are available for view even if you are not logged in.
  include 'nav.php' //Navigation.
?>

<!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="Width=device-width, initial scle=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title> GUESTBOOK  </title>
  
  <link rel="stylesheet" type="text/css" href="style.css">

  </head>

  <header>

  </header>

  <?php
   include 'footer.php' //Footer
   ?>
