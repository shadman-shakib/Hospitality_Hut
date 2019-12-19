<?php
session_start();

// initializing variables
$owner_username = "";
$owner_first_name = "";
$owner_last_name = "";
$owner_cell_no = "";
$owner_street_no = "";
$owner_street_name = "";
$owner_police_station = "";
$owner_city = "";
$owner_email = "";
$passw = "";
$owner_errors = array(); 
$database_name = 'meeting_place';

// connect to the database
$db = mysqli_connect('localhost', 'root', $passw, $database_name );
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $owner_username = mysqli_real_escape_string($db, $_POST['owner_username']);
  $owner_first_name= mysqli_real_escape_string($db,$_POST['owner_first_name']);
  $owner_last_name= mysqli_real_escape_string($db,$_POST['owner_last_name']);
  $owner_cell_no= mysqli_real_escape_string($db,$_POST['owner_cell_no']);
  $owner_street_no= mysqli_real_escape_string($db,$_POST['owner_street_no']);
  $owner_street_name= mysqli_real_escape_string($db,$_POST['owner_street_name']);
  $owner_police_station= mysqli_real_escape_string($db,$_POST['owner_police_station']);
  $owner_city= mysqli_real_escape_string($db,$_POST['owner_city']);
  $owner_email = mysqli_real_escape_string($db, $_POST['owner_email']);
  //$rent_place = mysqli_real_escape_string($db, $_POST['rent_place']);
  $owner_password_1 = mysqli_real_escape_string($db, $_POST['owner_password_1']);
  $owner_password_2 = mysqli_real_escape_string($db, $_POST['owner_password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($owner_username)) { array_push($owner_errors, "Username is required"); }
  if (empty($owner_email)) { array_push($owner_errors, "Email is required"); }
  if (empty($owner_password_1)) { array_push($owner_errors, "Password is required"); }
  if ($owner_password_1 != $owner_password_2) {
  array_push($owner_errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $owner_user_check_query = "SELECT * FROM owner WHERE owner_user_name='$owner_username' OR email='$owner_email' LIMIT 1";
  $owner_result = mysqli_query($db, $owner_user_check_query);
  $owner_user = mysqli_fetch_assoc($owner_result);
  
  if ($owner_user) { // if user exists
    if ($owner_user['owner_username'] === $owner_username) {
      array_push($owner_errors, "Username already exists");
    }

    if ($user['owner_email'] === $owner_email) {
      array_push($owner_errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($owner_errors) == 0) {
    $owner_password = md5($owner_password_1);//encrypt the password before saving in the database
echo "<script>window.alert('$password')</script>";
    $owner_query = "INSERT INTO owner VALUES('$owner_username','$owner_first_name','$owner_last_name','owner_$email','$owner_cell_no','$owner_street_no','$owner_street_name','$owner_police_station','$owner_city','owner_$password') ";
    mysqli_query($db, $owner_query);
    $_SESSION['owner_username'] = $owner_username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}
  //owner log in
  // LOGIN USER
if (isset($_POST['login_user'])) {
  $owner_username = mysqli_real_escape_string($db, $_POST['owner_username']);
  $owner_password = mysqli_real_escape_string($db, $_POST['owner_password']);

  if (empty($owner_username)) {
    array_push($owner_errors, "Username is required");
  }
  if (empty($owner_password)) {
    array_push($owner_errors, "Password is required");
  }

  if (count($owner_errors) == 0) {
    //echo "<script>window.alert('$username and $password')</script>";
    $owner_password = md5($owner_password);
    echo $owner_password;
    $owner_query = "SELECT * FROM owner WHERE owner_user_name=$owner_username AND owner_pass='$owner_password'";
    $owner_results = mysqli_query($db, $owner_query);


    if (mysqli_num_rows($owner_results) == 1) {
      //echo "<script>window.alert('matched')</script>";
      $_SESSION['owner_username'] = $owner_username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');

    }
    else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//logout
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['owner_username']);
    header('location: owner_login.php');
  }
?>