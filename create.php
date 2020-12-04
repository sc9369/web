<?php

session_start();

  if (!isset($_SESSION['email'])) {
    echo "<script>alert('You have to login first!');window.location.href='/test/login.php';</script>";
  }


$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'alpha');

// REGISTER USER
if (isset($_POST['reg_game'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $host = mysqli_real_escape_string($db, $_POST['host']);
  $game = mysqli_real_escape_string($db, $_POST['game']);
  $etype = mysqli_real_escape_string($db, $_POST['etype']);
  $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
  $img=mysqli_real_escape_string($db, $_POST['img']);


  if (empty($title)) { array_push($errors, "Event Name is required"); }
  if (empty($host)) { array_push($errors, "Host Name is required"); }

 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO newt (event, host, game, type, start, img) VALUES ('$title', '$host', '$game', '$etype', '$startdate','$img')";
  	mysqli_query($db, $query);
  	/*$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');*/
  }
}
?>
<html>
<head>
 
    <title>Create Tournament</title>
    <link rel="stylesheet" type="text/css" href="aqw.css">
 


    
    </style>
</head>
	<body>
		<header>
			<div class="container">
		<div class="header">
			<h2>Host Tournament</h2>
		</div>
		<form id="form" class="form" method="POST" action = "create.php">
			<div class="form-control">
				<label for="title">Event Name</label>
				<input type="text" name="title" />
				<small>Error message</small>
			</div>
			<div class="form-control">
				<label for="username">Host Name</label>
				<input type="text" placeholder="Host Name" name="host" />
				<small>Error message</small>
			</div>
			<div>
			<label for="game">Select a Game</label>

				<select name="game" id="game">
				  <option disabled selected value> -- select an option -- </option>
				  <option value="CS">Counter Strike</option>
				  <option value="D2">Destiny 2</option>
				  <option value="COD">Call Of Duty</option>
				  <option value="PUBG">Players Unknown</option>
				</select>
			</div>
			<br>
			<div>
				<label>Event Type :</label>
				<label for="Online">Online</label>
				<input id ="Online" name = "etype" type="radio" value= "Online">
				<label for="LAN">LAN</label>
				<input id ="LAN" name = "etype" type="radio" value="LAN">
			</div>
			<br>
			<div>
				<label>
				Date:
				<input type="date" name="startdate" required />

			</div>
			<br>
			<div class="form-control">
				<label for="img">Image</label>
				<input type="text" placeholder="Image URL" name="img" />
				<small>Error message</small>
			</div>
			<br>
			
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
			<button name="reg_game">Submit</button>
		</form>
	</div>
			 
		</header>
    
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script type="text/javascript" src="../src/jquery.mkinfinite.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('header').mkinfinite({
					maxZoom:       1.2,
					animationTime: 4000,
					imagesRatio:   (960 / 720),
					isFixedBG:     true,
					zoomIn:        true,
					imagesList:    new Array(
						
						'https://www.theloadout.com/wp-content/uploads/2019/10/lol-esports-arena-crowd.jpg',
                        'https://cdn1.dotesports.com/wp-content/uploads/2018/09/21190818/1006425794.jpg',
                        'https://cdn1.dotesports.com/wp-content/uploads/2018/08/12045232/ELEAGUE.jpg',
						'https://www.denofgeek.com/wp-content/uploads/2018/02/counter_strike.jpg?fit=1999%2C1333',
						'https://i.pinimg.com/originals/77/a0/fe/77a0fee8ca8678859411f28fc1c7f65e.jpg',
						'https://gaming4.cash/wp-content/uploads/2018/04/Best-eSports-games-2018.png','https://cdn.mos.cms.futurecdn.net/zL729kyXcGRWB7k4rPo7tZ.jpg'
					)
				});
			});
		</script>
	</body>
</html>