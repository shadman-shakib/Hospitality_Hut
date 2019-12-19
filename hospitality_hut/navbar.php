<header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index.php">Home</a>
          <a class="p-2 text-muted" href="order.php">Orders</a>
          <a class="p-2 text-muted" href="post_add.php">Post Add</a>        
          
        </nav>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="index.php">Hospitality Hut</a>
          </div>
          <div class="col-4">
            <nav class="nav d-flex justify-content-between">
             <?php if (!isset($_SESSION['username'])) {
          echo '<a class="p-2 text-muted" href="login.php">Login</a>';
        }else{
          echo '<a class="p-2 text-muted" href="myloc.php?logout=1">logout</a>';
        } ?>
          <a class="p-2 text-muted" href="register.php">Register</a>
          
        </nav>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between" style="border-bottom: 1px solid #dedede;">
           <form name="from10" action="search.php" method="post" class="form-inline" style="width: 100%">
     
      
<div class="row" style="width: 100%">
    <div class="col-5">
        
        <select name="t17"  class="form-control" style="width: 100%">
          <option value="">Select sport type</option>
    <option value="cricket">cricket</option>
    <option value="football">football</option> 
  </select>

</div>

    <div class="col-5">
 <select name="t16"  class="form-control" style="width: 100%">
          <option value="">Select City</option>
    <option value="ctg">ctg</option>
    <option value="dhk">dhk</option> 
  </select>
</div>
<div class="col-1" style="    padding-top: 8px;">
<input type="checkbox" name="nearby" value="checked">nearby
</div>
<div class="col-1" style="    padding-top: 3px;">
    <input type="submit" class="btn btn-sm btn-outline-secondary" name="submit11" value="SEARCH">
  </div>
</div>
  
  </form>
        </nav>
      </div>