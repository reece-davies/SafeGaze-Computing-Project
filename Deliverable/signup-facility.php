<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body class="blue-background">
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container">
      <form class="form-login" action="php/signup-facility.inc.php" method="post">
        <div class="jumbotron">
          <div class="text-center mb-4">
            <img class="mb-4" src="./images/icons/user.png" alt="" width="72" height="72">
            <h1 class="h2 mb-3 font-weight-normal facility-colour">Facility signup</h1>
          </div>

          <?php include ("./inc/signup-errors.inc.php"); ?>

          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control form-control-facility" name="inputEmail" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
          </div>

          <div class="form-label-group">
            <input type="email" id="inputConfirmEmail" class="form-control form-control-facility" name="inputConfirmEmail" placeholder="Confirm email address" required autofocus>
            <label for="inputConfirmEmail">Confirm email address</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control form-control-facility" name="inputPassword" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputConfirmPassword" class="form-control form-control-facility" name="inputConfirmPassword" placeholder="Confirm password" required autofocus>
            <label for="inputConfirmPassword">Confirm password</label>
          </div>

          <br>

          <div class="form-label-group">
            <input type="text" id="inputUsername" class="form-control form-control-facility" name="inputUsername" placeholder="Username" required autofocus>
            <label for="inputUsername">Username</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputFacilityName" class="form-control form-control-facility" name="inputFacilityName" placeholder="Facility name" required autofocus>
            <label for="inputFacilityName">Facility name</label>
          </div>

          <div class="form-label-group">
            <input type="tel" id="inputTelephone" class="form-control form-control-facility" name="inputTelephone" placeholder="Telephone number" required autofocus>
            <label for="inputTelephone">Telephone number</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputAddress" class="form-control form-control-facility" name="inputAddress" placeholder="Street address" required autofocus>
            <label for="inputAddress">Street address</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputPostcode" class="form-control form-control-facility" name="inputPostcode" placeholder="Postcode" required autofocus>
            <label for="inputPostcode">Postcode</label>
          </div>

          <br>

          <div class="form-label-group">
            <input type="text" id="inputAccessCode" class="form-control form-control-facility" name="inputAccessCode" placeholder="Facility's access code" required autofocus>
            <label for="inputAccessCode">Facility's access code</label>
          </div>

          <button class="btn btn-lg btn-cyan btn-block" type="submit" name="signup-facility-submit">Sign up</button>
          <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
        </div>
      </form>
    
    </div>








    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>