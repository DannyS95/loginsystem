<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

<meta charset="UTF-8">
  <meta name="description" content="Login system">
  <meta name="keywords" content="Armilustrium">
  <meta name="author" content="Armilustrium">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body, html {
	height: 100%;
	width: 100%;
	display: flex;
	align-items: center;
	font-family: Georgia, serif;
}
h3 {
	color: 	#778899;
	font-family: "Comic Sans MS", cursive, sans-serif;
}
</style>

</head>

<body>
<div class="container col-md-4">
	<div class="card" style=" background: rgba(200, 200, 200, 0.1);">
		<form action="auth/register.php" method="POST">
			<div class="card-header text-center form-control">
				<h3>Register</h3>
			</div>
				<?php
				function errorMessage($message)
				{
					$error = "<div class=\"bg-danger mt-4 p-3 mb-2 bg-danger text-white>\">
							{$message}
					</div>";
					echo "$error";
				}
				if($_GET['validatePassword']) {
					errorMessage('Your passwords do not match');
				} else if ($_GET['emailTaken']) {
					errorMessage('E-mail address is already in use');
				} else if ($_GET['emailNotValid']) {
					errorMessage('Please enter a valid email');
				} else if ($_GET['passwordNotValid']) {
					errorMessage('Password must be at least 6 characters long');
				}
				?>
			<div class="card-body">
			  <div class="form-group mb-3">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" id="name" placeholder="Enter your Name" name=":name" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name=":email" required>
			  </div>
			  <div class="form-group mb-3">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" name=":password" required>
				<small class="form-text text-muted">We recommend a unique password</small>
			  </div>
			  <div class="form-group mb-2">
			    <label for="passwordConfirmation">Password</label>
			    <input type="password" class="form-control" id="passwordConfirmation" placeholder="Password Confirmation" name="passwordConfirmation" required>
				<small class="form-text text-muted mb-4">Make sure both passwords match</small>
				<button name="submit" type="submit" class="btn btn-primary" value="submit" style="border-radius: 0">
					Sign up
				</button>
			  </div>
	  		</div>
		</form>
	</div>
</div>
</body>

</html>
