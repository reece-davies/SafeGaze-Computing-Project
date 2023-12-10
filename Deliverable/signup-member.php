<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body class="green-background">
    <?php include ("./inc/navbar.inc.php"); ?>


    <script>
      function checkForm(form)
      {
        if(!form.terms.checked) {
          alert("Please indicate that you accept the Terms and Conditions");
          form.terms.focus();
          return false;
        }
        return true;
      }
    </script>

    <div class="container">
      <form class="form-login" action="php/signup-member.inc.php" method="post" onsubmit="return checkForm(this);">
        <div class="jumbotron">
          <div class="text-center mb-4">
            <img class="mb-4" src="./images/icons/user.png" alt="" width="72" height="72">
            <h1 class="h2 mb-3 font-weight-normal member-colour">Member signup</h1>
          </div>

          <?php include ("./inc/signup-errors.inc.php"); ?>

          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control form-control-member" name="inputEmail" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
          </div>

          <div class="form-label-group">
            <input type="email" id="inputConfirmEmail" class="form-control form-control-member" name="inputConfirmEmail" placeholder="Confirm email address" required autofocus>
            <label for="inputConfirmEmail">Confirm email address</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control form-control-member" name="inputPassword" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputConfirmPassword" class="form-control form-control-member" name="inputConfirmPassword" placeholder="Confirm password" required autofocus>
            <label for="inputConfirmPassword">Confirm password</label>
          </div>

          <br>

          <div class="form-label-group">
            <input type="text" id="inputUsername" class="form-control form-control-member" name="inputUsername" placeholder="Username" required autofocus>
            <label for="inputUsername">Username</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputFirstName" class="form-control form-control-member" name="inputFirstName" placeholder="First name" required autofocus>
            <label for="inputFirstName">First name</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputLastName" class="form-control form-control-member" name="inputLastName" placeholder="Last name" required autofocus>
            <label for="inputLastName">Last name</label>
          </div>

          <div class="form-label-group">
            <input type="date" id="inputDOB" class="form-control form-control-member" name="inputDOB" placeholder="Date of birth" required autofocus>
            <label for="inputDOB">Date of birth</label>
          </div>

          <select class="custom-select form-control-member" name="inputGender">
            <option selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>

          <div style="padding-bottom: 1rem;"> </div>
          <br>

          <div class="form-label-group">
            <input type="text" id="inputAccessCode" class="form-control form-control-member" name="inputAccessCode" placeholder="Facility's access code" required autofocus>
            <label for="inputAccessCode">Facility's access code</label>
          </div>

          <div style="color: red; padding-bottom: 2rem;"><input type="checkbox" name="terms"> I <b>WILL NOT</b> record nor share any footage displayed within SafeGaze</div>

          <button class="btn btn-lg btn-success btn-block" type="submit" name="signup-member-submit">Sign up</button>
          <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>


          <!--
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
              <br>
              <br>
              <a>Don't have an account? Sign up <a class="member-link" href="#">here</a></a>
            </label>
          </div>
          <button class="btn btn-lg btn-success btn-block" type="submit">Log in</button>
          <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
          -->

        </div>
      </form>
    
    </div>








    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>