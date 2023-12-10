<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body style="padding-top: 2rem;">

    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="index-background position-relative overflow-hidden text-center bg-light">
      <div class=" col-md-5 p-lg-5 mx-auto my-5">
        <div>    
          <img src="./images/icons/Logo-white-cropped.png"  class="logo-center" />
        </div>
        <h1 class="display-4 font-weight-normal" style="font-size: 4rem; color: white;"><b>SafeGaze</b></h1>
        <p class="lead font-weight-normal" style="color: white;">Improve the security of your facility by providing your members with a secure live streaming platform. </p>
        <a class="btn btn-outline-light" href="./signup-facility.php">Get Started</a>
        
      </div>
    </div>
   

    <div class="d-md-flex flex-md-equal">
      <div class="bg-dark pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Facility</h2>
          <p class="lead">For sports clubs and facilities</p>
          <a class="btn btn-actions btn-light" href="login-facility.php">Log in</a>
          <a class="btn btn-outline-light" href="signup-facility.php">Sign up</a>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <div>    
            <img src="./images/icons/building-icon.png"  class="facility-icon"/>
          </div>
        </div>
      </div>
      <div class="bg-light pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Member</h2>
          <p class="lead">For parents and participants</p>
          <a class="btn btn-secondary" href="login-member.php">Log in</a>
          <a class="btn btn-outline-secondary" href="signup-member.php">Sign up</a>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <div>    
            <img src="./images/icons/member-icon.png"  class="member-icon" />
          </div>
        </div>
      </div>
    </div>




        

    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>