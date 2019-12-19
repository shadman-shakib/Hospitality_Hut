<?php include('server.php') ?>
<?php include 'header.php';?>
<div class="container">
      <?php include 'navbar.php';?>



  <form class="form-signin" method="post" action="login.php" style="
    padding-left: 30%;
    padding-right: 30%;
    padding-top: 12%;
    padding-bottom: 12%;
    background-color: #f9f9f9;">
      <h1 class="h3 mb-3 font-weight-normal">Please login</h1>
      <?php include('errors.php'); ?>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail"  name="username"  class="form-control" placeholder="User Name" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
      
      <button class="btn btn-lg btn-primary btn-block" name="login_user" type="submit">Login</button>
      <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
    </form>
	 
  

     <?php include 'footer.php';?>