<?php include('server.php');   
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }?>
 <?php include 'header.php';?>

    
<div class="container">
      <?php include 'navbar.php';?>

      
<main role="main" class="container" style="
    padding-top: 4%;
    background-color: #f9f9f9;
">
    
<h3>Your Orders</h3>
<div class="row mb-2">
    
<?php
$place=$_POST["t6"];
if(isset($_POST["t6"])){
$conn = mysqli_connect('localhost', 'root', $passw, $database_name );
$sqlI = "insert INTO renting (username, place_ID) VALUES('$_SESSION[username]','$_POST[place_ID]')";
mysqli_query($conn, $sqlI);
mysqli_close($conn);
}
$user=$_SESSION["username"];

    $sqlS = "SELECT * FROM client where username='$user'";


    $resultS=mysqli_query($db, $sqlS);
    $resultA=mysqli_num_rows($resultS);
    //echo"working ";
    if($resultA>0){
    	
    	

    while ($row=mysqli_fetch_array($resultS)) {
        # code...
        
        $sqlSR = "SELECT * FROM renting_place where place_ID='$place'";


	    $resultSR=mysqli_query($db, $sqlSR);
	    $resultAR=mysqli_num_rows($resultSR);
	    //echo"working ";
	    if($resultAR>0){

	    while ($row=mysqli_fetch_array($resultSR)) {
	        # code...
	        
	        echo '<div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">'. $row["type"] . '</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">'. $row["place_ID"] .'</a>
              </h3>
              <div class="mb-1 text-muted">Available : '. $row["start_date"] .' to '. $row["end_date"] .'</div>
              <p class="card-text mb-auto">City: '. $row["city"] . '</p>
              <p class="card-text mb-auto">Volum: '. $row["volum"] . '</p>
              <p class="card-text mb-auto">Volum: '. $row["renting_price"] . '</p>
            
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1681a65af7f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1681a65af7f%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
          </div>
        </div>';

	      }

   }
}
}


   ?>   
      
    </div>   

    </main><!-- /.container -->
<?php include 'footer.php';?>
