
<?php


	session_start();


		$link = mysqli_connect("localhost", "root", "", "bfd", "3308");

			if(mysqli_connect_error()) {

				die ("There was an error connecting to the database");
			}



	  		$error = ""; 

	  		$update = false;

	  		$id = 0;
		  	$firstName = "";
			$lastName = "";
			$email = "";
			$message = "";




		// ==================
		//    CREATE USER
		// ==================


	  		if(array_key_exists('submit', $_POST)) {


	  			// FORM VALIDATION
	

	  			if(!$_POST['firstName']) {

	  				$error .= "First name is required. ";
	  			}	  			

	  			if(!$_POST['lastName']) {

	  				$error .= "Last name is required. ";
	  			}	  			


	  			if(!$_POST['email']) {

	  				$error .= "Email address is required. ";
	  			}


	  			if ($error != "") {

	  				$_SESSION['message'] = $error ;
					$_SESSION['msg_type'] = "danger";

		

				} else {

					// Add form data to db

					$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
					$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
					$email = mysqli_real_escape_string($link, $_POST['email']);
					$message = mysqli_real_escape_string($link, $_POST['message']);


					$query = "INSERT INTO `users` (`firstName`, `lastName`, `email`, `message`) VALUES ('$first_name', '$last_name', '$email', '$message')";

					// Check if successfully added to db

					if (mysqli_query($link, $query)) {

						$_SESSION['message'] = "You have been added to the database!" ;
						$_SESSION['msg_type'] = "success";

					    header("Location: users.php");

					} else {

					   $_SESSION['message'] = "Something went wrong!" ;
					   $_SESSION['msg_type'] = "danger";

					}

				}


	  		}






	  	// ==================
		//    DELETE USER
		// ==================



	  		if(array_key_exists('delete', $_GET)) {

	  			$id = $_GET['delete'];

	  			$query = "DELETE FROM `users` WHERE id=$id";


	  			if (mysqli_query($link, $query)) {

	  			$_SESSION['message'] = "User has been deleted!";
				$_SESSION['msg_type'] = "success";

	  				header("Location: users.php");


					} else {

					   $_SESSION['message'] = "Unable to delete user";
						$_SESSION['msg_type'] = "danger";
					}
	  		}





	  	// ==================
		//    EDIT USER
		// ==================


	  		if(array_key_exists('edit', $_GET)) {

	  			$id = $_GET['edit'];

	  			$update = true;

	  			$query = "SELECT * FROM `users` WHERE id=$id";

	  			$result = mysqli_query($link, $query);

	  				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	  				$firstName = $row['firstName'];
	  				$lastName = $row['lastName'];
	  				$email = $row['email'];
	  				$message = $row['message'];
	  			

	  		}



	  	// ==================
		//    UPDATE USER
		// ==================


	  		if(array_key_exists('update', $_POST)) {

	  			$id = $_POST['id'];
	  			$first_name = mysqli_real_escape_string($link, $_POST['firstName']);
				$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
				$email = mysqli_real_escape_string($link, $_POST['email']);
				$message = mysqli_real_escape_string($link, $_POST['message']);

	  			$query = "UPDATE `users` SET firstName='$first_name', lastName='$last_name', email='$email', message='$message' WHERE id=$id";




	  			// Check if successfully updated db

					if (mysqli_query($link, $query)) {
					$_SESSION['message'] = "User has been updated!";
					$_SESSION['msg_type'] = "success";

					    header("Location: users.php");


					} else {

					    $_SESSION['message'] = "Something went wrong!" ;
						$_SESSION['msg_type'] = "danger";

					}

	  			

	  		}





	  	?> 