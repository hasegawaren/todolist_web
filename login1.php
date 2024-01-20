<?php 
    session_start();
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up and Sign in</title>
  <link rel="stylesheet" href="test..css"/>
  <script src="js/loginjs.js" defer></script>
</head>

  <body>
    <div class="container" id="container">
      <div class="form-container register-container">
        <form action="register_db.php" method="POST">
          <h1>Register here</h1>
          

          <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['warning'])) { ?>
        <div class="alert alert-warning" role="alert">
            <?php 
                echo $_SESSION['warning'];
                unset($_SESSION['warning']);
            ?>
        </div>
    <?php } ?>
          <input type="text" name="firstname" placeholder="Firstname">
          <input type="text" name="lastname" placeholder="Lastname">
          <input type="email" name="email" placeholder="Email">
          <input type="password" name="password" placeholder="Password">
          <input type="password" name="c_password" placeholder="Confirm Password">
          <button name="signup" type="submit">Sign Up</button>
        </form>
      </div>
  
      <div class="form-container login-container">
        <form action="login_db.php" method="POST">
          <h1>Login here</h1>
          <input type="email" name="email" placeholder="Email">
          <input type="password" name="password" placeholder="Password">
          <div class="content">
            <div class="checkbox">
              <input type="checkbox" name="checkbox" id="checkbox">
              <label>Remember me</label>
            </div>
          </div>
          <button name="signin" type="submit">Sign in</button>
        </form>
      </div>
  
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1 class="title">Hello <br> friends</h1>
            <p>if you have an account, login here and have fun</p>
            <button class="ghost" id="login">Login
              <i class="lni lni-arrow-left login"></i>
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1 class="title">Start you <br> journy now</h1>
            <p>if you don't have an account yet, join us and start your journey.</p>
            <button class="ghost" id="register">Register
              <i class="lni lni-arrow-right register"></i>
            </button>
            
          </div>
        </div>
      </div>
  
    </div>

  </body>
</body>
</html>
