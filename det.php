<?php

session_start(); 

$db = mysqli_connect('localhost', 'root', '', 'alpha') or die("Connect failed to Database! ");

$id = $_GET['id'];

$sql = "SELECT * FROM `newt` WHERE id =$id";
$result = mysqli_query($db, $sql);



if (mysqli_num_rows($result) > 0) { 
    $row = mysqli_fetch_assoc($result);
}

// if (mysqli_num_rows($result_comments) > 0) { 
//     $row_comment = mysqli_fetch_assoc($result_comments);
// }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Esports</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="nw.css">
    </head>
    <body>
        
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">   
                    <a class="navbar-brand" href="../index.php">
                        <i class="fas fa-image"></i>
                        E-sports
                      </a>
                      <ul class="nav navbar-nav navbar-right">
                        <?php  if (isset($_SESSION['email'])) : ?>
                            <span style="color:white;">Logged in as: <?php echo $_SESSION['email']; ?></span>
                        <?php endif ?>
                  </ul>
            </div>  
        </nav>
        


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Sponsors</p>
            <div class="list-group">
                <li class="list-group-item"> HP</li>
                <li class="list-group-item"> Intel</li>
                <li class="list-group-item"> Corsair</li>
                <li class="list-group-item"> HyperX</li>
                <li class="list-group-item"> Steelseries</li>
                <li class="list-group-item"> Logitech</li>
            </div>


            
        </div>


        <div class="col-md-9">
            <div class="img-thumbnail">
                <img class="img-responsive" src=<?php echo $row["img"] ?>>
                <div class="caption">
                    <h5 class="text-right"> <?php echo $row["start"] ?></h5>
                    <h4><a><?php echo $row["event"] ?></a></h4>
                    <p>Host : <?php echo $row["host"] ?></p>
                </div>
            </div>



            

        </div>
    </div>
</div>


    </body>
</html>