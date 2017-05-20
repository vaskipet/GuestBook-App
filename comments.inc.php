<!--This is Where ALL the functions are -->

<?php
// Setting all the comments that are posted into the database for everyone to view.
function setComments($conn) {
	if (isset($_POST['commentSubmit'])) { //unless the user clicks "comment" the code below doesn´t run
		$uid = $_POST['uid']; //_POST is the method used in the form
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comments (uid, date, message)
		VALUES ('$uid', '$date', '$message')";

		$result = $conn->query($sql); //inserting the data into the database
		//creating a connection to the database, and with this connection
		// query the above sql-string (line 11)  with the variable $sql
	}
}


// Posting all the comments from database to the fronpage, regardless
//if the user is logged in or not.
function getComments($conn) {
	$sql =  "SELECT * FROM comments";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$id = $row['uid'];
		$sql2 =  "SELECT * FROM user WHERE id='$id'";
		$result2 = $conn->query($sql2);
		if ($row2 = $result2->fetch_assoc()) { 
					echo "<div class='col-md-4 col-md-offset-4'>
    						<div class='row'>
        						<div class='col-md'>
            						<div class='panel panel-white post panel-shadow'><p>";
					echo $row2['uid']."<br>";
					echo $row['date']."<br><br>";
					echo nl2br($row['message']); //nl2br means if the comment is long then it should be in the same textbox
					echo "</p>";
					// Deleting a user´s comment when the user is logged in.
					if (isset($_SESSION['id'])) {
							if ($_SESSION['id'] == $row2['id']) {
								echo "<form class='deleteform' method='POST' action='".deleteComments($conn)."'>
									<input type='hidden' name='cid' value='".$row['cid']."'>
									<button type='submit' name='commentDelete'>Delete</button>
									</form>
									
									<form class='editform' method='POST' action='editcomment.php'>
									<input type='hidden' name='cid' value='".$row['cid']."'>
									<input type='hidden' name='uid' value='".$row['uid']."'>
									<input type='hidden' name='date' value='".$row['date']."'><br>
									<input type='hidden' name='message' value='".$row['message']."'>
									<button>Edit</button>
									</form>";
							} else {
							}
						} else {
							echo "<div class='commentmessage'>Log in to reply!</div>";
					}
				echo  "</div></div></div></div>";
		}
	}
}

//Prepared statement for Editing the comments.
function editComments($conn) {
	if (isset($_POST['commentSubmit'])) { //If the user clicks the commentSubmit -button..
		$cid = $_POST['cid'];
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$stmt = $conn->prepare("UPDATE comments SET message=? WHERE cid=?");
		$stmt->bind_param("ss", $edited, $commenter);

		$edited = $message;
		$commenter = $cid; 
		$stmt->execute();

		$result = $stmt->get_result();
		header("Location: index.php");
	}
}

//Prepared Function for deleting comments. Same user can delete who has written the comment.
function deleteComments($conn) {
	if (isset($_POST['commentDelete'])) { //If the user clicks the commentDelete -button..
		$cid = $_POST['cid'];

		$stmt = $conn->prepare("DELETE FROM comments WHERE cid=?");
		$stmt->bind_param("s", $commenter);

		$commenter = $cid;
		$stmt->execute();

		$result = $stmt->get_result();
		header("Location: index.php");
	}
}

