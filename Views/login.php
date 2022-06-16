<?php include_once("../Controllers/login_users.php") ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Store</title>
	<link type="text/css" rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#show_register').click(function(){
				$('.login_form').hide();
				$('.register_form').show();
				return false;
			});
			$('#show_login').click(function(){
				$('.register_form').hide();
				$('.login_form').show();
				return false;
			});
		});
	</script>
</head>
<body>
	<div id="mainwrapper">
		    <div class="navbar">
			    <div class="navbar-inner">
			        <div class="container">
			            <a class="brand" href="#">
      						Book Store
    					</a>
			        </div>
			    </div>
    		</div><!----------End navbar-------------->
    		<div id="content">

    			<?php 
    				if(isset($error)) { echo '<div class="alert alert-error">' . $error . '</div>'; }
    			?>
	    		
    			<div class="login_form">
    				<div id="form">
	    				<form method="post" action="login.php">
		    				<a class="brand">Login Here</a>

		    				<div class="form-elements">
		    					<label for="login_email">email</label>
		    					<input type="text" name="login_email" id="login_email">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<label for="password">Password</label>
		    					<input type="password" name="login_password" id="password">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<input type="submit" name="login" id="login" class="btn btn-success">
		    				</div><!----------End form-elements-------------->
		    				<br>
		    				<a href="#" id="show_register">Don't have an account?</a>
	    				</form>
	    			</div><!----------End form-------------->
    			</div><!----------End login_form-------------->




	    		<div class="register_form"> 
	    			<div id="form">
	    				<form method="post" action="login.php">
		    				<a class="brand">Register Here</a>

		    				<div class="form-elements">
		    					<label for="username">Username</label>
		    					<input type="text" name="username" id="username">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<label for="email">Email</label>
		    					<input type="text" name="email" id="email">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<label for="password">Password</label>
		    					<input type="password" name="password" id="password">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<label for="password">RePassword</label>
		    					<input type="password" name="repassword" id="repassword">
		    				</div><!----------End form-elements-------------->

		    				<div class="form-elements">
		    					<input type="submit" name="register" id="register" class="btn btn-success">
		    				</div><!----------End form-elements-------------->
		    				<br>
		    				<a href="#" id="show_login">Already have an account?</a>
	    				</form>
	    			</div><!----------End form-------------->
    			</div><!----------End register_form-------------->
    		</div><!----------End content-------------->
	</div>
	<!----------End mainwrapper-------------->
</body>
</html>
