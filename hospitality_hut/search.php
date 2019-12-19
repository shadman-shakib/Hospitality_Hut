<?php include('server.php')   ?>
 <?php include 'header.php';?>

    
<div class="container">
      <?php include 'navbar.php';?>

      
<main role="main" class="container" style="
    padding-top: 4%;
    background-color: #f9f9f9;
">
      <div class="row mb-2">
        <?php
  if(""!=$_POST["t16"] and ""!=$_POST["t17"]){
    $sqlSS = "SELECT * FROM renting_place WHERE city='".$_POST["t16"]."' and type='".$_POST["t17"]."'";
  }else if(""!=$_POST["t16"]){
    $sqlSS = "SELECT * FROM renting_place WHERE city='".$_POST["t16"]."'";
  }else if(""!=$_POST["t17"]){
    $sqlSS = "SELECT * FROM renting_place WHERE type='".$_POST["t17"]."'";
  }else{
    $sqlSS = "SELECT * FROM renting_place";
  }
    
$lat = $_SESSION['lat'];
$long = $_SESSION['log'];


    $resultSS=mysqli_query($db, $sqlSS);
    //echo"working ";
    
    $d=0;
    while ($row=mysqli_fetch_array($resultSS)) {
        # code...
      
     
         

        

         if(isset($_POST["nearby"])){
              if($lat+30 > $row["latitude"] and $lat-30 < $row["latitude"] and $long+30 > $row["longitude"] and $long-30 < $row["longitude"]){
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
              <p class="card-text mb-auto">Volum: '. $row["renting_prise"] . '</p>
              <form style="border: 0px solid #FF7F50;padding: 20px;background: #ffffff;" name="order" action="order.php" method="post">
              <input type="text" name="place_ID" value="'. $row["lace_ID"] .'" style="display: none;">
           <input type="submit" name="submit13" value="order" style="padding: opx;padding: inherit;margin-top: 19px;padding-top: 0px;padding-bottom: 6px;    background-color: #3d1f84;color: white;">
            </form>
            
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1681a65af7f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1681a65af7f%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
          </div>
        </div>';

            }
             $d=1;
          }
          if($d==0){
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
              <p class="card-text mb-auto">Volum: '. $row["renting_prise"] . '</p>
              <form style="border: 0px solid #FF7F50;padding: 20px;background: #ffffff;" name="order" action="order.php" method="post">
              <input type="text" name="place_ID" value="'. $row["place_ID"] .'" style="display: none;">
            <input type="submit" name="submit13" value="order" style="padding: opx;padding: inherit;margin-top: 19px;padding-top: 0px;padding-bottom: 6px;    background-color: #3d1f84;color: white;">
            </form>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1681a65af7f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1681a65af7f%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
          </div>
        </div>';
              
          }
          
         }
         
         
?>
        
        
      </div>
    </div>


      

    </main><!-- /.container -->

     <?php include 'footer.php';?>
