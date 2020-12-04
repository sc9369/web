<?php 

session_start();

$errors = array(); 
$db = mysqli_connect('localhost', 'root', '', 'alpha') or die("Connect failed to Database! ");

if(isset($_POST['login_user'])){
    
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";  
          header('location: index.php');
        }
        else{
            array_push($errors, "Wrong username/password combination");
        }
    }
        
}
?>
<html>

<head>
<title>E-Sports</title>
<link rel="stylesheet" href="login.css">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
    	<div class="container-fluid">   
                <a class="navbar-brand" href="index.html">
                    <i class="fas fa-image"></i>
                    E-Sports
                  </a>
                  <ul class="nav navbar-nav navbar-right">
                  </ul>
		</div>  
    </nav>


    <div class="form-body" style="min-height: 80vh;">

        <div class="container">

            <div class="header">
                <h2>Login Account</h2>
            </div>
    
            <form id="form" class="form" action="login.php" method="post">

                <div class="form-group">
                    <label for="username">Email</label>
                    <input class="form-control" type="email" placeholder="example@gmail.com" name="email" required/>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                
                <div class="form-group">
                    <label for="username">Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <?php  if (count($errors) > 0) : ?>
                <div class="error">
                <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
                <?php endforeach ?>
                    </div>
                    <?php  endif ?>
                
                <button name="login_user">Login</button>
    
            </form>
        </div>
    </div>
</body>
</html>