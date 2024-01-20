<?php 
    session_start();
    if (!isset($_SESSION['user_login'])) {
        header("location: login.php");
    }

?>

<?php 
    require_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    
    <?php 
        require_once("nav.php");
    ?>
<body class="bg-dark"></body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>    
</head>
<body>

  

  <?php 
    require_once("footer.php");
  ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>

    
    <main>

<div class="container marketing">

  <div class="row">
    <div class="col-lg-4">
      <img src="207149.jpg" alt="Bootstrap" class="bd-placeholder-img rounded-circle" width="140" height="140"></svg>

      <h2 class="nav-link px-2 link-light">Student ID</h2>
      <a class="nav-link px-2 link-light" >64109010353 </a>
      <a class="nav-link px-2 link-light" >64109010400 </a>
    </div>
    <div class="col-lg-4">
    <img src="207150.jpg" alt="Bootstrap" class="bd-placeholder-img rounded-circle" width="140" height="140"></svg>

    
      <h2 class="nav-link px-2 link-light">Contact</h2>
      <a class="nav-link px-2 link-light" >phichittra.jeenduang@g.swu.ac.th</p>
      <p>thanrada.wongsawat@g.swu.ac.th </p>
     
      
    </div>
  </div>

  <hr class="featurette-divider">

    </div>
  </div>

</div>

</main>