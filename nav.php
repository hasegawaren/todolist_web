<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
     

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="welcome.php" class="nav-link px-3 link-light">Home</a></li>
        <li><a href="todo.html" class="nav-link px-3 link-light">To-Do List</a></li>
        <li><a href="information.php" class="nav-link px-3 link-light">Information</a></li>
        <li><a href="about.php" class="nav-link px-3 link-light">About Us</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <?php if (isset($_SESSION['user_login'])) { ?>
            <a href="logout.php" class="btn btn-danger me-2">Log out</a>
        </div>
        <?php } else { ?>
            <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
            <a href="register.php" class="btn btn-primary">Sign-up</a>
        <?php } ?>
    </header>
  </div>