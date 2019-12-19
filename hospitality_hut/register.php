<?php include('server.php') ?>
<?php include 'header.php';?>
<div class="container">
      <?php include 'navbar.php';?>
  	



  <div class="col-md-12 order-md-1" style=" background-color: #f9f9f9;    padding-top: 5%;">
          <h4 class="mb-3">Registration form</h4>
          <form class="needs-validation" novalidate="" method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="first_name" value="<?php echo $first_name; ?>">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="" name="last_name" value="<?php echo $last_name; ?>">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="client_username" placeholder="Username" required="" name="username" value="<?php echo $username; ?>">
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="<?php echo $email; ?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="Password">Password</label>
              <input type="text" class="form-control" id="Password" placeholder="" required="" name="password_1">
              <div class="invalid-feedback">
                Please enter your Password.
              </div>
            </div>

            <div class="mb-3">
              <label for="Confirm">Confirm Password</label>
              <input type="text" class="form-control" id="Confirm" placeholder="" name="password_2">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="city">City</label>
                <select class="custom-select d-block w-100" id="city" required="" name="city" value="<?php echo $city; ?>">
                  <option value="">Choose...</option>
                  <option value="dhk">Dhaka</option>
                  <option value="ctg">Chittagon</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid city.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="Street">Street Name</label>
                <input type="text" class="form-control" id="Street" placeholder="Avenue .." required="" name="street_name" value="<?php echo $street_name; ?>">
                <div class="invalid-feedback">
                  Please provide a valid Street.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="No">Street No</label>
                <input type="text" class="form-control" id="No" placeholder="" required="" name="street_no" value="<?php echo $street_no; ?>">
                <div class="invalid-feedback">
                  Street No code required.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="Police">Police Station</label>
                <input type="text" class="form-control" id="Police" placeholder="" value="" required="" name="police_station" value="<?php echo $police_station; ?>">
                <div class="invalid-feedback">
                  Valid Police Station is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="Cell">Cell No</label>
                <input type="text" class="form-control" id="Cell" placeholder="" value="" required="" name="cell_no" value="<?php echo $cell_no; ?>">
                <div class="invalid-feedback">
                  Valid Cell No is required.
                </div>
              </div>
            </div>
            
            
            
            <hr class="mb-4">


            <h4 class="mb-3">Type</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <INPUT TYPE="Radio" Name="client_check" Value="client_">Client
     
              </div>
              <div class="custom-control custom-radio">
               <INPUT TYPE="Radio" Name="owner_check" Value="owner_">Owner
              </div>
              
            </div>
            
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit"  name="reg_user">Register</button>
          </form>
        </div>

     <?php include 'footer.php';?>