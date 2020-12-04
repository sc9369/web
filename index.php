<?php

session_start(); 

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: index.php");
  }


?>
<html>

<head>
<title>E-sports</title>
<link rel="stylesheet" href="style.css">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


</head>


<body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">   
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-image"></i>
                    E-Sports
                  </a>
                  <ul class="nav navbar-nav navbar-right">
                    <?php  if (isset($_SESSION['email'])) : ?>
                      <span style="color:white;">Logged in as: <?php echo $_SESSION['email']; ?></span>
                    <?php endif ?>
                  </ul>
    </div>  
    </nav>
    
    <div class="jumbotron jumbotron-fluid-">
        <div class="content">
            <h1 class="display-3">Welcome!</h1>
            <p class="lead">Your E-Sports Hub</p>
            <?php  if (isset($_SESSION['email'])) : ?>
              <a href="index.php?logout='1'"><button class="btn btn-danger">Logout</button></a>
            <?php else: ?> 
              <a href="login.php"><button class="btn btn-primary">Login</button></a>
              <a href="signup.php"><button class="btn btn-success">Sign Up</button></a>
            <?php endif ?>
        </div>
    </div>

    <div class="container">

      <div class="row">
      

        <div class="col-lg-4 col-md-6 mb-3">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="https://ik.imagekit.io/afkmedia/tr:h-250/media/images/88337-Cover%20Image%20-%20ESL,%20FACEIT%20&%20ESEA%20Ban%20New%20Skins.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Participate</h5>
              <p class="card-text">Participate in upcoming tournaments</p>
              <a href="tourni.php" class="btn btn-primary">More Details</a>
            </div>
          </div>
        </div>

          <div class="col-lg-4 col-md-6 mb-3">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="https://d351kgpk2ntpv6.cloudfront.net/static/img/landing-features/league/tournament-banner.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Create</h5>
                <p class="card-text">Host your Local/Online Tournament</p>
                <a href="create.php" class="btn btn-primary">More Details</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-3">
            <div class="card" style="width: 20rem;">
              <img class="card-img-top" src="https://www.hotspawn.com/app/uploads/2019/09/csgo_vitality_shox.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">News</h5>
                <p class="card-text">Follow the latest E-sports News</p>
                <a href="news.php" class="btn btn-primary">More Details</a>
              </div>
            </div>
          </div>


      </div>
    

    </div>

    <footer style="margin-left: 20px;"> 
      <hr>
      <a href="webproabs.php"><h6>About</h6></a>
    </footer>  
    

</body>

</html>   