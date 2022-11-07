
<?php
  include 'inc/header.php';
  include 'inc/slider.php';
?>

        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
              <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                   <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center">Register</h5>
                  <form class="form-signin">
                    <div class="form-label-group">
                      <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                      <label for="inputUserame">Username</label>
                    </div>
      
                   
                    <hr>
      
                    <div class="form-label-group">
                      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                      <label for="inputPassword">Password</label>
                    </div>
                  
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" style=" margin:auto;
                    display:block;" type="submit">Register</button>
                    <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                    <hr class="my-4">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
           
<?php
  include 'inc/footer.php';
  
?>
