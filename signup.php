<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<br><br><br><br>
		<div style="margin: auto;width: 25%;">
			<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	 		 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			</div>

<form action="add-admin.php" method="post">
		<div class="form-group">
			<label for="username">Username :</label>
			<input type="text" class="form-control" id="username" placeholder="Username" name="username">
		</div>
		<div class="form-group">
			<label for="password">Password :</label>
			<input type="password" class="form-control" id="password" placeholder="Password" name="password">
		</div>
		
		
		<input type="submit" name="register" class="btn btn-success" value="Register" id="register">
		
	</form>
</body>
</html>