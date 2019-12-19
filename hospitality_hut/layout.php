 <?php include 'header.php';

 session_start();
 $_SESSION['lat']=$_GET["latitude"];
 $_SESSION['log']= $_GET["longitude"]; 
?>
<div class="container">
      <?php include 'navbar.php';?>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">About Us</h1>
          <p class="lead my-3">Nowadays, several small/medium size companies are operating throughout
our country but, they are facing difﬁculties in terms of client management.
The primary reason for this difﬁculty arises because, they have limited
ﬁnance so, they are unable to afford a proper meeting place or room
in which they will accommodate prosperous clients.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
            
            
        </div>
          
      </div>
    

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Playing Ground</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">UIU Ground</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto"> </p>
              <!--<a href="#">Continue reading</a>-->
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="uiu.jpg" height="400" width="320" alt="Card image cap">
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Convention Hall</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Shena Malancha</a>
              </h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="card-text mb-auto"></p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" src="url5.jpg" height="400" width="320" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>

    <main role="main" class="container">
      

    </main><!-- /.container -->

     <?php include 'footer.php';?>