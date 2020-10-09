<?php require_once 'header.php'; ?>
<?php require_once 'process.php'; ?>


  	<div class="background-2 background"></div>


  		<!-- SUCCESS/ ERROR ALERT -->


  		<?php if (isset($_SESSION['message'])) { ?>

		  	<div id="error-box" class="alert alert-<?=$_SESSION['msg_type']?> text-center" role="alert"> 	
		 			<p></p>
		 			<p>
		 				<?php 
			 				echo $_SESSION['message'];
			 				unset($_SESSION['message']);
			 			?>
		 			</p>		
		  	</div>

	  	<?php } ?>




	 <!-- MAIN CONTENT -->


  	<div class="container content">
  		<h1 class="text-center mb-5">VIEW ALL USERS</h1>

	

		<!-- GET DATA FROM DB -->

		<?php 
			
			$link = mysqli_connect("localhost", "root", "", "bfd", "3308");

			if(mysqli_connect_error()) {

				die ("There was an error connecting to the database");
			} 


			$query = "SELECT * FROM users";

			if ($result = mysqli_query($link, $query)) { 

		?>

				<div class='row justify-content-center'>

				<?php 
					while($row = mysqli_fetch_array($result)) { 

						$firstName = $row['firstName'];
						$lastName = $row['lastName'];
						$email = $row['email'];
						$message = $row['message'];

				?>


					<!-- DISPLAY DATA -->

					<div class='col-lg-4 text-center my-4'>


						<div class="card">
	  						<div class="card-header">							
	  							<strong><?php echo $firstName." ".$lastName; ?></strong>
	  						</div>
	  					
		  					<ul class="list-group list-group-flush">
							    <li class="list-group-item"><?php echo $email; ?></li>
							    <li class="list-group-item"><?php echo $message; ?></li>
							    <li class="list-group-item">
							    	<a href="index.php?edit=<?php echo $row['id']; ?>" class='btn btn-sm btn-info mx-2'>Edit</a>
							    	<a href="process.php?delete=<?php echo $row['id']; ?>" class='btn btn-sm btn-danger mx-2'>Delete</a>
							    </li>
							    
								
							</ul>

						</div>

					</div>	


				<?php } ?>


				</div>


	<?php } ?>



		<div class="text-center my-5">
			<a href="/BigFootDigital/" class="btn btn-info btn-smart">Create New</a>
		</div>


	</div>



<?php require_once 'footer.php'; ?>