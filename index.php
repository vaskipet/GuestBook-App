<?php
	include 'header.php';
?>

<body>

<!--The user is informed that he is not logged in if he hasn´t logged in.-->
  <?php
    if (isset($_SESSION['id'])) {
      echo $_SESSION['id'];
    } else {
      echo "<div class='notice'><p>You are not logged in!</p></div>";
    }
   ?>
   <br>

<!-- Posting all the comments -->
<!-- If the user is logged in s/he can post comments -->
<?php
if (isset($_SESSION['id'])){
echo "<div class='conatainer'>
        <div class='row'>
          <div class='col-md-12'>
          		<form method='POST' id='commentform' action='".setComments($conn)."'> 
              <input type='hidden' name='uid' value='".$_SESSION['id']."'>
              <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
              <div id='comment-message' class='form-row'><textarea name='message' placeholder='Message' id='comment'></textarea></div><br>
              <button type='submit' name='commentSubmit' id='commentSubmit' class='btn btn-default'>Comment</button>
              </form> 
          </div>
        </div>
      </div>";

  } else {
    echo "<div class='notice'><p>You need to be logged in to comment! </p>
  	</div><br>";
  }
  getComments($conn);
  ?>


</body>

</html>
