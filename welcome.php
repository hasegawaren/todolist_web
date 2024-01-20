<?php 
    session_start();
    if (!isset($_SESSION['user_login'])) {
        header("location: login1.php");
    }
    require_once('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-left: -20px;
        }    
    </style>    
</head>
<body>
<div class="banner">
            <video autoplay loop muted plays-inline>
                <source src="video2.mp4" type="video/mp4">
            </video>

    <?php 
        require_once("nav.php");
    ?>
    <div class="px-3 py-3 my-5 text-center">
    
        <?php 

            $user_id = $_SESSION['user_login'];
            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
            $stmt->bindParam(":user_id", $user_id);
            // $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>
    
    <h1 class="nav-link px- link-light">Welcome User </h1>
    <p class="nav-link px-2 link-light">Let's start a list of things to do!!!</p>
    <center><a class="btn btn-danger me-2" href="todo.html" >let's go </a></center>



  <?php 
    require_once("footer.php");
  ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>

