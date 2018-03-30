<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
		<form action="auth/signin.php" method="POST">
			<div class="card-header text-center form-control">
				<h3>Login</h3>
			</div>
			<?php
			function errorMessage($message)
			{
				$error = "<div class=\"bg-danger mt-4 p-3 mb-2 bg-danger text-white>\">
						{$message}
				</div>";
				echo "$error";
			}
			if ($_GET['wrongEmail']) {
				errorMessage('Wrong email address');
			} else if ($_GET['wrongPassword']) {
				errorMessage('Wrong Password');
			}
			?>
			<div class="card-body">
			  <div class="form-group mb-2">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
			    <small id="emailHelp" class="form-text text-muted">Your email is confedential</small>
			  </div>
			  <div class="form-group mb-2">
			    <label for="exampleInputPassword1"><i class="ion-ios-locked-outline"></i>Password</label>
			    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
				<small class="form-text text-muted">Don't share your password</small>
				</div>
				<div class="form-group">
					<div class="form-check mb-2">
					  <input class="form-check-input" type="checkbox" id="rememberLogin" name="rememberLogin">
					  <label class="form-check-label" for="gridCheck">
						Remember my credentials
					  </label>
				</div>
	  	  		  <button name="submit" type="submit" class="btn btn-primary mt-3" value="submit" style="border-radius: 0">
	  				  Sign in
	  			  </button>
  		  </div>
			  </div>
	  	  </div>
		</form>
	</div>
</div>
<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
	$email = $_COOKIE['email'];
	$password = $_COOKIE['password'];

	echo "<script>
		document.getElementById('email').value = '$email';
		document.getElementById('password').value = '$password';
		document.getElementById('rememberLogin').checked = true;
	</script>";
}
 ?>
</body>

</html>
