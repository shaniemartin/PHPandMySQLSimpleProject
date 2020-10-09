
<?php require_once 'header.php'; ?>
<?php require_once 'process.php'; ?>



	<div class="background"></div>


	  <!-- FORM VALIDATION ERROR -->

  	  <?php if (isset($_SESSION['message'])) { ?>

		  	<div id="error-box" class="alert alert-<?=$_SESSION['msg_type']?> text-center" role="alert"> 	
		 			<p></p>
		 			<p>
		 				<?php 
			 				echo $_SESSION['message'];
			 				// unset($_SESSION['message']);
			 			?>
		 			</p>		
		  	</div>

	  	<?php } ?>




	<!-- MAIN CONTENT -->


	  	<div class="container content">
	  		<?php if($update === true) { ?>

	  			<h1 class="text-center mb-5">UPDATE YOUR DETAILS BELOW</h1>

	  		<?php } else { ?>

	  			<h1 class="text-center mb-5">ENTER YOUR DETAILS BELOW</h1>

	  		<?php } ?>
	  		

				<form id="inputForm" method="post">
					<input type="hidden" name="id" value="<?php echo $id ?>">

				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="firstName">First Name</label>
				      <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="lastName">Last Name</label>
				      <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
				    </div>
				  </div>

				  <div class="form-row">
					  <div class="form-group col">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" placeholder="123@gmail.com" name="email" value="<?php echo $email; ?>">
					  </div>
				  </div>

				  <div class="form-row">
					  <div class="form-group col">
					    <label for="message">Message</label>
					    <textarea class="form-control" id="message" rows="8" name="message" ><?php echo $message; ?></textarea>
					  </div>
				  </div>

				
					<?php if($update === true) { ?>

	  					<button type="submit" name="update" class="btn btn-info btn-smart">Update User</button>

	  				<?php } else { ?>

	  					<button type="submit" name="submit" class="btn btn-info btn-smart">Create User</button>

	  				<?php } ?>
				  
				  	
				  	<a href="/BigFootDigital/users.php" class="btn btn-info btn-smart">View All Users</a>

				</form>
	  	</div>



<?php require_once 'footer.php'; ?>