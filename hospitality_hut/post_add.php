<?php include('server.php')?>
<?php include 'header.php';?>

<div class="container">
      <?php include 'navbar.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
</head>
<body>
	<div class="col-md-12 order-md-1" style=" background-color: #f9f9f9;    padding-top: 5%;">
          <h4 class="mb-3">Post Your Add</h4>
          <form class="needs-validation" novalidate="" method="post" action="post_add.php">
            <?php include('errors.php'); ?>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="place_ID">Place ID</label>
                <input type="text" class="form-control" id="place_ID" placeholder="" value="" required="" name="t6" value="<?php echo $place_ID; ?>">
                <div class="invalid-feedback">
                  Valid Place id is required.
                </div>
              </div>
            </div> 

            <div class="col-md-6 mb-3">
              <label for="longitude">Longitude</label>
              <input type="text" class="form-control" id="longitude" placeholder="" value="" required="" name="t7" value="<?php echo $longitude; ?>">
                <div class="invalid-feedback">
                  Valid longitude is required.
                </div>

    	    </div> 
    	    <div class="col-md-6 mb-3">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="longitude" placeholder="" value="" required="" name="t8" value="<?php echo $latitude; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
    	    </div>
    	    <div class="col-md-6 mb-3">
                <label for="start_date">Start Date</label>
                <input type="text" class="form-control" id="start_date" placeholder="" value="" required="" name="t9" value="<?php echo $start_date; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
    	    </div>
    	    <div class="col-md-6 mb-3">
                <label for="end_date">End Date</label>
                <input type="text" class="form-control" id="end_date" placeholder="" value="" required="" name="t10" value="<?php echo $end_date; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
             </div>  
              
                <div class="col-md-6 mb-3">
                <label for="renting_price">Price </label>
                <input type="text" class="form-control" id="renting_price" placeholder="" value="" required="" name="t12" value="<?php echo $renting_price; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
              </div>
              

                 <div class="col-md-6 mb-3">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" placeholder="" value="" required="" name="t13" value="<?php echo $type; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
               </div>
               

                <div class="col-md-6 mb-3">
                <label for="city">City </label>
                <input type="text" class="form-control" id="city" placeholder="" value="" required="" name="t14" value="<?php echo $city; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
              </div>
              


                <div class="col-md-6 mb-3">
                <label for="firstName">Volum </label>
                <input type="text" class="form-control" id="volum" placeholder="" value="" required="" name="volum" value="<?php echo $volum; ?>">
                <div class="invalid-feedback">
                  Valid latitude is required.
                </div>
              </div> 
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit"  name="submit12">Post</button>   
    	</form>
    </div>  
     <form name="from10" action="" method="post">
      

        <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit"  name="submit10">Profile</button>    



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
$lat="";
$long="";

if(isset($_POST["submit10"]))
{
        $user=$_SESSION["username"];

    $sqlS = "SELECT * FROM owner where username='$user'";


    $resultS=mysqli_query($db, $sqlS);
    $resultA=mysqli_num_rows($resultS);
    //echo"working ";
    if($resultA>0){

    while ($row=mysqli_fetch_array($resultS)) {
        # code...
        echo"<table>";
        echo "<tr><td>" . "User Name: ". $row["username"] . "</td><td>";
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
            echo "<tr><td>" . "Renting Price: ". $row["renting_price"] . "</td><tr>";
            echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><tr>";
            echo "<tr><td>" . "City: ". $row["city"] . "</td><tr>";
            echo "<tr><td>" . "Volume: ". $row["volum"] . "</td></tr>";
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
              echo "<tr><td>" . "Renting Price: ". $row["renting_price"] . "</td><tr>";
              echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><tr>";
              echo "<tr><td>" . "City: ". $row["city"] . "</td><tr>";
              echo "<tr><td>" . "Volume: ". $row["volum"] . "</td></tr>";
              echo '<tr><td><form style="border: 0px solid #FF7F50;padding: 20px;background: #ffffff;" name="order" action="order.php" method="post">
              <input type="text" name="place_ID" value="'. $row["place_ID"] .'" style="display: none;">
            <input type="submit" name="submit13" value="order">
            </form></td></tr>';
          }
         	
         }
         echo "</table>";
         
         

}
?>



<!-- <?php


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
        echo "<tr><td>" . "Renting Price: ". $row["renting_price"] . "</td><td>";
        echo "<tr><td>" . "Place Type: ". $row["type"] . "</td><td>";
        echo "<tr><td>" . "City: ". $row["city"] . "</td><td>";
        echo "<tr><td>" . "Volume: ". $row["volum"] . "</td><td>";
        echo "<tr><td>..</td><tr>";
      



      }

   }

}

?> -->





<?php


if(isset($_POST["submit10"]))
{
        $user=$_SESSION["username"];

    $sqlS = "SELECT * FROM owner where username='$user'";


    $resultS=mysqli_query($db, $sqlS);
    $resultA=mysqli_num_rows($resultS);
    //echo"working ";
    if($resultA>0){

    while ($row=mysqli_fetch_array($resultS)) {
        # code...
        echo"<table>";
        echo "<tr><td>" . "User Name: ". $row["username"] . "</td><td>";
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


        
    

</div>    


</body>
</html>
 <?php include 'footer.php';?>