<?php

//session_start(); 

  // if (!isset($_SESSION['username'])) {
  //  $_SESSION['msg'] = "You must log in first";
  //  header('location: login.php');
  // }

  // if (isset($_GET['logout'])) {
  //   session_destroy();
  //   unset($_SESSION['username']);
  //   header("location: index.php");
  // }

$db = mysqli_connect('localhost', 'root', '', 'alpha') or die("Connect failed to Database! ");;

$sql = "SELECT * FROM newt";
$result = mysqli_query($db, $sql);

?>
<html>

<head>
<title>E-sports</title>
<link rel="stylesheet" href="trn.css">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>


<body>

    <nav class="navbar navbar-dark bg-dark">
    	<div class="container-fluid">   
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-image"></i>
                    Home
                  </a>
                  <ul class="nav navbar-nav navbar-right">
                  </ul>
		</div>  
    </nav>
    
    <div class="jumbotron jumbotron-fluid-">
        <div class="content">
            <h1 class="display-3">Upcoming Tournaments</h1>
            <p class="lead">Participate In Tournaments</p>
        </div>
    </div>
    <div id="myBtnContainer">
      <label style="color:red;">Filter By Game  :  </label>
      <button class="btn active" onclick="filterSelection('all')"> All Games</button>
      <button class="btn" onclick="filterSelection('CS')"> Counter Strike</button>
      <button class="btn" onclick="filterSelection('D2')"> Destiny 2</button>
      <button class="btn" onclick="filterSelection('PUBG')"> Player Unknowns</button>
      <button class="btn" onclick="filterSelection('COD')"> Call Of Duty</button>
    </div>
    <div class="container">

      <div class="row">

      <?php if (mysqli_num_rows($result) > 0) { 
            while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="filterDiv <?php echo $row["game"] ?>">
          <div class="card-body<?php echo $row["game"] ?>">
                <h3 class="card-title"><?php echo $row["event"] ?> <?php echo $row["start"] ?></h3>
                <h4 class="card-text">Host : <?php echo $row["host"] ?></h4>
                <p class="card-text">Event Type : <?php echo $row["type"] ?></p>
                <a href="det.php?id=<?php echo $row["id"] ?>"class="btn btn-primary">Details</a>
              </div>
        </div>
        <?php  } } ?> 

          

      </div>
    

    </div>

    <footer style="margin-left: 20px;"> 
      <hr>
      <a href="webproabs.php"><h6>About</h6></a>
    </footer>  
    

</body>
<script type="text/javascript" src="tou.js"></script>
</html>  
