<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'alpha');

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $bday = mysqli_real_escape_string($db, $_POST['bday']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, gender, bday, password) 
  			  VALUES('$username', '$email','$gender', '$bday', '$password')";
  	mysqli_query($db, $query);
 	$_SESSION['email'] = $email;
 	header('location: index.php');
  }
}
?>
<head>
<title>Sign-up</title>
<link rel="stylesheet" type="text/css" href="signup.css">

</head>
<body>
	
	<div class="container">
		<div class="header">
			<h2>Create Account</h2>
		</div>
		<form id="form" class="form" method="POST" action = "signup.php">
			<div class="form-control">
				<label for="username">Username</label>
				<input type="text" placeholder="Name" name="username" />
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Email</label>
				<input type="email" placeholder="your email" name="email" />
				<small>Error message</small>
			</div>
			<div>
				<label>Gender : </label>
				<label for="male">Male</label>
				<input id ="male" name = "gender" type="radio" value= "male">
				<label for="female">Female</label>
				<input id ="female" name = "gender" type="radio" value="female">
				<label for="others">Others</label>	
				<input id ="others" name = "gender" type="radio" value="others">
			</div>
			<br>
			<div>
				<label>
				Birthday:
				<input type="date" name="bday" required />

			</div>
			<br>
			<div class="form-control">
				<label for="username">Password</label>
				<input type="password" placeholder="Password" name="password_1"/>
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Re-enter Password</label>
				<input type="password" placeholder="Password" name="password_2"/>
				<small>Error message</small>
			</div>
			<div>
				<label for = "agreed" > I agree the terms and conditions</label>
				<input id="agreed" name = "agreed" type ="checkbox" required>
			</div>
			<?php  if (count($errors) > 0) : ?>
	  			<div class="error">
	  			<?php foreach ($errors as $error) : ?>
	  	  		<p><?php echo $error ?></p>
	  			<?php endforeach ?>
	  		</div>
<?php  endif ?>
			<button type ="submit" name="reg_user">Submit</button>
		</form>
	</div>
</body>
<script type="text/javascript" src="abc.js"></script>
