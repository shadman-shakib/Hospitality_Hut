<?php
session_start();

// initializing variables
$username = "";
$first_name = "";
$last_name = "";
$cell_no = "";
$street_no = "";
$street_name = "";
$police_station = "";
$city = "";
$email = "";
$passw = "";
$errors = array(); 
$client_designation = "";
$owner_designation = "";
$database_name = 'hospitality_hut';

// connect to the database
$db = mysqli_connect('localhost', 'root', $passw, $database_name );

// REGISTER USER

if (isset($_POST['reg_user']) AND ($_POST['client_check'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $first_name= mysqli_real_escape_string($db,$_POST['first_name']);
  $last_name= mysqli_real_escape_string($db,$_POST['last_name']);
  $cell_no= mysqli_real_escape_string($db,$_POST['cell_no']);
  $street_no= mysqli_real_escape_string($db,$_POST['street_no']);
  $street_name= mysqli_real_escape_string($db,$_POST['street_name']);
  $police_station= mysqli_real_escape_string($db,$_POST['police_station']);
  $city= mysqli_real_escape_string($db,$_POST['city']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $client_designation = mysqli_real_escape_string($db, $_POST['client_check']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM client WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
echo "<script>window.alert('$password')</script>";
  	$query = "INSERT INTO client VALUES('$username','$first_name','$last_name','$email','$cell_no','$street_no','$street_name','$police_station','$city','$password','$client_designation') ";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

elseif (isset($_POST['reg_user']) AND ($_POST['owner_check'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $first_name= mysqli_real_escape_string($db,$_POST['first_name']);
  $last_name= mysqli_real_escape_string($db,$_POST['last_name']);
  $cell_no= mysqli_real_escape_string($db,$_POST['cell_no']);
  $street_no= mysqli_real_escape_string($db,$_POST['street_no']);
  $street_name= mysqli_real_escape_string($db,$_POST['street_name']);
  $police_station= mysqli_real_escape_string($db,$_POST['police_station']);
  $city= mysqli_real_escape_string($db,$_POST['city']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $owner_designation = mysqli_real_escape_string($db, $_POST['owner_check']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM owner WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database
     echo "<script>window.alert('$password')</script>";
    $query = "INSERT INTO owner VALUES('$username','$first_name','$last_name','$email','$cell_no','$street_no','$street_name','$police_station','$city','$password','$owner_designation') ";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: post_add.php');
  }
}







// LOGIN USER



     /* if(isset($_POST['login_user'])){

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $password = mysqli_real_escape_string($db, $_POST['password']);


     if (empty($username)) 
    { 
      array_push($errors, "Username is required");
     }
  if (empty($password)) 
    { 
      array_push($errors, "Password is required");
     }

    if(count($errors) == 0){

          $password=md5($password); //encription password

          $query="SELECT * from client where client_user_name='$username' and client_pass='$password' ";
          $result=mysqli_query($db,$query);

          if(mysqli_num_rows($result)==1){
                     

















          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');







          
































          }

         else{


                array_push($errors, "username/password are wrong");
              



         }










  }
}
 */     if(isset($_POST['login_user'])){

      $username = mysqli_real_escape_string($db, $_POST['username']);
      $password = mysqli_real_escape_string($db, $_POST['password']);


     if (empty($username)) 
    { 
      array_push($errors, "Username is required");
     }
  if (empty($password)) 
    { 
      array_push($errors, "Password is required");
     }

    if(count($errors) == 0){

          $password=md5($password); //encription password
          $query1="SELECT * from owner where username='$username' and password='$password' ";
          $result1=mysqli_query($db,$query1);

           
          if(mysqli_num_rows($result1)==1){     
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
          }
        



          $query="SELECT * from client where username='$username' and password='$password' ";
          $result=mysqli_query($db,$query);

          if(mysqli_num_rows($result)==1){     
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
          }


          
           else{
                 


                array_push($errors, "username/password are wrong");
              

             }


        }


        echo "outer is working!<br>";

        if(count($errors) == 0){

          echo "2nd is is working!<br>";

          $password=md5($password); //encription password
          $query="SELECT * from client where username='$username' and password='$password' ";
          $result=mysqli_query($db,$query);
          if(mysqli_num_rows($result)==1){     
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');

          }
          
           else{

                  
                array_push($errors, "username/password are wrong");
              

             }


        } 
     
     echo "2nd outer is working!<br>";



      }
//ngrok.exe http port_no
 /* if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
  }*/
?>