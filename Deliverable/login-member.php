<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body class="green-background">
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container">
      <form class="form-login" action="php/login-member.inc.php" method="post">
        <div class="jumbotron">
          <div class="text-center mb-4">
            <img class="mb-4" src="./images/icons/user.png" alt="" width="72" height="72">
            <h1 class="h2 mb-3 font-weight-normal member-colour">Member login</h1>
          </div>

          <?php include ("./inc/login-errors.inc.php"); ?>

          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control form-control-member" name="inputEmail" placeholder="Email address" required autofocus>
            <label for="inputEmail">Email address</label>
          </div>

          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control form-control-member" name="inputPassword" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
              <br>
              <br>
              <a>Don't have an account? Sign up <a class="member-link" href="signup-member.php">here</a></a>
            </label>
          </div>
          <button class="btn btn-lg btn-success btn-block" type="submit" name="login-member-submit">Log in</button>
          <p class="mt-5 mb-3 text-muted text-center">&copy; 2020-2021</p>
        </div>
      </form>
    
    </div>








    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>