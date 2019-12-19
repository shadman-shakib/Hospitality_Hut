<?php include('server.php')?>
<?php include 'header.php';?>

<div class="container">
      <?php include 'navbar.php';?>


<?php include('server.php')   ?>


<?php 
  //session_start();
  $lat = $_GET["latitude"];
	$long = $_GET["longitude"]; 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

      


<form name="form10" action=""method="post">


    <tr>
      <td>This section is Only For Owner.</td> 
    </tr>
    <tr>
      <td>Fillup the form</td> 
    </tr>
    <tr>
        <td>ID</td>
        <td><input type="text" name="t6"></td>


    </tr>
    <tr>
        <td>Londitude</td>
        <td><input type="text" name="t7"></td>
    </tr>
    <tr>
        <td>Latitude</td>
        <td><input type="text" name="t8"></td>


    </tr>
    <tr>
        <td>Start Date</td>
        <td><input type="text" name="t9"></td>


    </tr>
    <tr>
        <td>End Date</td>
        <td><input type="text" name="t10"></td>


    </tr>
     <!-- <tr>
        <td>End Date</td>
        <td><input type="text" name="t11"></td>


    </tr> -->
    <tr>
        <td>Price</td>
        <td><input type="text" name="t12"></td>


    </tr>
    <tr>
        <td>Type</td>
        <td><input type="text" name="t13"></td>


    </tr>
    <tr>
        <td>City</td>
        <td><input type="text" name="t14"></td>


    </tr>
    <tr>
        <td>Volume</td>
        <td><input type="text" name="t15"></td>


    </tr>
    <input type="submit" name="submit12" value="POST">





</form>




<body>
       
       <form name="from10" action="" method="post">
      

        <input type="submit" name="submit10" value="Display Profile">    



    <tr>
    	
       
        <td><select name="t17" style="width: 25%;">
        	<option value="">Select type</option>
	  <option value="cricket">cricket</option>
	  <option value="football">football</option>
	 
	</select></td>
	<td><select name="t16" style="width: 25%;">
        	<option value="">Select City</option>
	  <option value="ctg">ctg</option>
	  <option value="dhk">dhk</option>
	 
	</select></td>
	<td><input type="checkbox" name="nearby" value="checked">nearby<br></td>


    </tr>

    <input type="submit" name="submit11" value="SEARCH">


    <!-- <input type="submit" name="display_post" value="Display Post"> 
-->
  </form>


<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
   

<?php


if(isset($_POST["submit10"]))
{
        $user=$_SESSION["username"];

    $sqlS = "SELECT * FROM client where client_user_name='$user'";


    $resultS=mysqli_query($db, $sqlS);
    $resultA=mysqli_num_rows($resultS);
    //echo"working ";
    if($resultA>0){

    while ($row=mysqli_fetch_array($resultS)) {
        # code...
        echo"<table>";
        echo "<tr><td>" . "User Name: ". $row["client_user_name"] . "</td><td>";
        echo "<tr><td>" . "First Name: ". $row["first_name"] . "</td><td>";
        echo "<tr><td>" . "Last Name: ". $row["last_name"] . "</td><td>";
        echo "<tr><td>" . "E-mail: ". $row["email"] . "</td><td>";
        echo "<tr><td>" . "Contact No: ". $row["cell_no"] . "</td><td>";
      


        echo "</td>";


      }

   }

}
if(isset($_POST["submit11"]))
{

	if(""!=$_POST["t16"] and ""!=$_POST["t17"]){
    $sqlSS = "SELECT * FROM renting_place WHERE city='".$_POST["t16"]."' and type='".$_POST["t17"]."'";
	}else if(""!=$_POST["t16"]){
		$sqlSS = "SELECT * FROM renting_place WHERE city='".$_POST["t16"]."'";
	}else if(""!=$_POST["t17"]){
		$sqlSS = "SELECT * FROM renting_place WHERE type='".$_POST["t17"]."'";
	}else{
		$sqlSS = "SELECT * FROM renting_place";
	}
		



    $resultSS=mysqli_query($db, $sqlSS);
    //echo"working ";
    echo"<table>";
    $d=0;
    while ($row=mysqli_fetch_array($resultSS)) {
        # code...
      
     
         

        

         if(isset($_POST["nearby"])){
              if($lat+30 > $row["latitude"] and $lat-30 < $row["latitude"] and $long+30 > $row["longitude"] and $long-30 < $row["longitude"]){
                echo "<tr><td>" . "nearby......... "."</td><tr>";
            echo "<tr><td>" . "Place ID: ". $row["place_ID"] . "</td><tr>";
            echo "<tr><td>" . "Londitude: ". $row["longitude"] . "</td><tr>";
            echo "<tr><td>" . "Latitude: ". $row["latitude"] . "</td><tr>";
            echo "<tr><td>" . "Start Date: ". $row["start_date"] . "</td><tr>";
            echo "<tr><td>" . "End Date: ". $row["end_date"] . "</td><tr>";
            echo "<tr><td>" . "Renting Price: ". $row["renting_prise"] . "</td><tr>";
            echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><tr>";
            echo "<tr><td>" . "City: ". $row["city"] . "</td><tr>";
            echo "<tr><td>" . "Volume: ". $row["volume"] . "</td></tr>";
            echo '<tr><td><form style="border: 0px solid #FF7F50;padding: 20px;background: #ffffff;">
            <input type="text" name="place_ID" value="'. $row["place_ID"] .'">
            <input type="submit" name="submit13" value="order">
            </form></td></tr>';
           

            }
             $d=1;
          }
          if($d==0){
              echo "<tr><td>" . "Place ID: ". $row["place_ID"] . "</td><tr>";
              echo "<tr><td>" . "Londitude: ". $row["longitude"] . "</td><tr>";
              echo "<tr><td>" . "Latitude: ". $row["latitude"] . "</td><tr>";
              echo "<tr><td>" . "Start Date: ". $row["start_date"] . "</td><tr>";
              echo "<tr><td>" . "End Date: ". $row["end_date"] . "</td><tr>";
              echo "<tr><td>" . "Renting Price: ". $row["renting_prise"] . "</td><tr>";
              echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><tr>";
              echo "<tr><td>" . "City: ". $row["city"] . "</td><tr>";
              echo "<tr><td>" . "Volume: ". $row["volume"] . "</td></tr>";
              echo '<tr><td><form style="border: 0px solid #FF7F50;padding: 20px;background: #ffffff;" name="order" action="order.php" method="post">
              <input type="text" name="place_ID" value="'. $row["place_ID"] .'" style="display: none;">
            <input type="submit" name="submit13" value="order">
            </form></td></tr>';
          }
         	
         }
         echo "</table>";
         
         

}
?>



<?php


if(isset($_POST["display_post"]))
{
        $userR=$_SESSION["username"];

    $sqlSR = "SELECT * FROM renting_place";


    $resultSR=mysqli_query($db, $sqlSR);
    $resultAR=mysqli_num_rows($resultSR);
    //echo"working ";
    if($resultAR>0){

    while ($row=mysqli_fetch_array($resultSR)) {
        # code...
        echo"<table>";
        
        echo "<tr><td>" . "Place ID: ". $row["place_ID"] . "</td><td>";
        echo "<tr><td>" . "Londitude: ". $row["longitude"] . "</td><td>";
        echo "<tr><td>" . "Latitude: ". $row["latitude"] . "</td><td>";
        echo "<tr><td>" . "Start Date: ". $row["start_date"] . "</td><td>";
        echo "<tr><td>" . "End Date: ". $row["end_date"] . "</td><td>";
        echo "<tr><td>" . "Renting Price: ". $row["renting_prise"] . "</td><td>";
        echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><td>";
        echo "<tr><td>" . "City: ". $row["city"] . "</td><td>";
        echo "<tr><td>" . "Volume: ". $row["volume"] . "</td><td>";
        echo "<tr><td>..</td><tr>";
      



      }

   }

}

?>





<?php


if(isset($_POST["submit10"]))
{
        $user=$_SESSION["username"];

    $sqlS = "SELECT * FROM owner where owner_user_name='$user'";


    $resultS=mysqli_query($db, $sqlS);
    $resultA=mysqli_num_rows($resultS);
    //echo"working ";
    if($resultA>0){

    while ($row=mysqli_fetch_array($resultS)) {
        # code...
        echo"<table>";
        echo "<tr><td>" . "User Name: ". $row["owner_user_name"] . "</td><td>";
        echo "<tr><td>" . "First Name: ". $row["first_name"] . "</td><td>";
        echo "<tr><td>" . "Last Name: ". $row["last_name"] . "</td><td>";
        echo "<tr><td>" . "E-mail: ". $row["email"] . "</td><td>";
        echo "<tr><td>" . "Contact No: ". $row["cell_no"] . "</td><td>";
      


        echo "</td>";


      }

   }
}





if(isset($_POST["submit12"]))
{


    $sqlI = "insert INTO renting_place VALUES('$_POST[t6]','$_POST[t7]','$_POST[t8]','$_POST[t9]','$_POST[t10]','$_POST[t12]','$_POST[t13]','$_POST[t14]','$_POST[t15]')";


    $resultS=mysqli_query($db, $sqlI);
    //echo"working ";

}

?>


        
               
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    

</div>
		
</body>
</html>


<html>
