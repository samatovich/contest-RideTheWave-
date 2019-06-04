<?php
	session_start();
	
	$goto = $_GET["goto"];
	
	if(isset($_SESSION["user"])){ // check user session first
		header("Location: ../UserProfile/?goto=login");
	}
?>

<html>
	<head></head>
	<body>
		<?php
			if($goto == "signin"){ // sing in form
				?>
					<form method="POST" action="../function/function.php?goto=signin">
						<label><h3>Sign In</h3></label>
						<input type="text" placeholder="username" name="username" /><br />
						<input type="password" placeholder="password" name="password" /><br />
						<input type="submit" /><input type="reset" /><br />
						<label><a href="?goto=signup">[sign up]</a></label>
					</form>
				<?php
			}
			if($goto == "signup"){ // sing up form
				?>
					<form method="POST" action="../function/function.php?goto=signup">
						<label><h3>Sign Up</h3></label>
						<input type="text" placeholder="username" name="username" /><br />
						<input type="password" placeholder="password" name="password_1" /><br />
						<input type="password" placeholder="password" name="password_2" /><br />
						<input type="submit" /><input type="reset" /><br />
						<label><a href="?goto=signin">[sign in]</a></label>
					</form>
				<?php
			}
		?>
	</body>
</html>