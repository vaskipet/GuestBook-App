<?php
	include 'header.php';
?>

<?php
//Error handling has been implemented using mostly the URL or the address in the address bar.
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //superglobal that gets the information from browser´s URL.
if (strpos($url, 'error=empty') !== false){ //if in the url there is "error=empty" it will echo the next line
	echo "You left empty fields. Fill out all the fields!"; // signup.inc.php
}
elseif (strpos($url, 'error=username') !== false){
	echo "Username already exists!"; // signup.inc.php has this 
}

  if (isset($_SESSION['id'])) {
    echo "


          <p class='pCenter'> Hi there friend! </p>"; // User gets this message if s/he is already logged in and tries to sign up.
  } else {
    echo "<p class='pCenter'>You are not logged in!</p>";
  }
 ?>

<?php

if (isset($_SESSION['id'])) {
	echo "<p class='pCenter'> You are already logged in! </p>";
} else {
// SignUp -form that is created using the bootstrap.
	echo "<div class='sign'>
          <legend>New to Guestbook? Sign Up! </legend>
          <form action='signup.inc.php' method='POST'>
          		<input type='text' class='sign' name='first' placeholder='Firstname'><br><br>
           	  <input type='text' class='sign' name='last' placeholder='Lastname'><br><br>
            	<input type='text' class='sign' name='uid' placeholder='Username'><br><br>
              <input type='password' class='sign' name='pwd' placeholder='Password'><br><br>
              <button type='submit' class='btn btn-warning'>SIGN UP!</button>
          </form></div>";
}

?>

  </body>

  </html>
