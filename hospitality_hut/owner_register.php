<?php include('owner_server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Owner Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Owner Registration</h2>
  </div>
  
  <form method="post" action="owner_register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $owner_username; ?>">
    </div>    
    <div class="input-group">
    <label>First Name</label>
      <input type="text" name="first_name" value="<?php echo $owner_first_name; ?>">
    </div>
    <div class="input-group">
    <label>Last Name</label>
      <input type="text" name="last_name" value="<?php echo $owner_last_name; ?>">
    </div>
    <div class="input-group">
    <label>Cell No</label>
      <input type="text" name="cell_no" value="<?php echo $owner_cell_no; ?>">
    </div>
    <div class="input-group">
    <label>Street No</label>
      <input type="text" name="street_no" value="<?php echo $owner_street_no; ?>">
    </div>
    <div class="input-group">
    <label>Street Name</label>
      <input type="text" name="street_name" value="<?php echo $owner_street_name; ?>">
    </div>
    <div class="input-group">
    <label>Police Station</label>
      <input type="text" name="police_station" value="<?php echo $owner_police_station; ?>">
    </div>
    <div class="input-group">
    <label>City</label>
      <input type="text" name="city" value="<?php echo $owner_city; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $owner_email; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="owner_password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="owner_password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
      Already a member? <a href="owner_login.php">Sign in</a>
    </p>
  </form>
</body>
</html>