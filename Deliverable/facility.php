<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("./inc/side-navbar.inc.php"); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          

          <h2>Facility Information</h2>
          <p class="facility-colour">Please note: input boxes shaded in blue cannot be altered.</p>

          <form action="./php/change-facility-information.inc.php" method="post">

            <?php 

            // Checks URL if DB post was success
            if (isset($_GET['submit']))
            {
                if ($_GET['submit'] == 'success')
              {
                // Run alert to inform user
                echo '<body onload="facilityInfoSubmitSuccess()"></body>';
              }
            }          
            
            
            include ("./inc/login-errors.inc.php");

            echo '<input type="hidden" name="facilityid" value="'.  $_SESSION['facilityId'] .'">';

            require './php/dbh.inc.php';

            $sql = "SELECT * FROM facilities where facility_id=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                //header("Location: /active-members.php?error=sqlerror");
                //echo '<p class="error-message"> There has been an error </p>';
                echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
                exit();
            }
            else
            {
              mysqli_stmt_bind_param($stmt, "s", $_SESSION['facilityId']);
              mysqli_stmt_execute($stmt);

              $result = mysqli_stmt_get_result($stmt);

              while ($row = mysqli_fetch_assoc($result))
              {
                //$_SESSION['facilityId'];
                //$_SESSION['facilityUsername'];
                //$_SESSION['accessCode'];
                $facilityName = $row['facility_name'];
                $facilityEmail = $row['email_address'];
                $facilityAddress = $row['address'];
                $facilityPostcode = $row['postcode'];
                $facilityTelephone = $row['telephone'];
              }
            }

              
            echo '
            <div class="row">
              <div class="col-sm">
                <div class="form-label-group">
                  <input type="text" id="inputFacilityName" value="'.$facilityName.'" class="form-control form-control-facility" name="inputFacilityName" placeholder="Facility Name" required autofocus>
                  <label for="inputFacilityName">Facility Name</label>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-label-group">
                  <input type="text" id="inputUsername" value="'.$_SESSION['facilityUsername'].'" class="form-control form-control-facility" name="inputUsername" placeholder="Username" readonly>
                  <label for="inputUsername">Username</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm">
                <div class="form-label-group">
                  <input type="text" id="inputTelNo" value="'.$facilityTelephone.'" class="form-control form-control-facility" name="inputTelNo" placeholder="Telephone Number" required autofocus>
                  <label for="inputTelNo">Telephone Number</label>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-label-group">
                  <input type="text" id="inputEmail" value="'.$facilityEmail.'" class="form-control form-control-facility" name="inputEmail" placeholder="Email Address" readonly>
                  <label for="inputEmail">Email Address</label>
                </div>
              </div>
            </div>

            <div class="form-label-group">
              <input type="text" id="inputStreetAddress" value="'.$facilityAddress.'" class="form-control form-control-facility" name="inputStreetAddress" placeholder="Street Address" required autofocus>
              <label for="inputStreetAddress">Street Address</label>
            </div>

            <div class="form-label-group">
              <input type="text" id="inputPostcode" value="'.$facilityPostcode.'" class="form-control form-control-facility" name="inputPostcode" placeholder="Postcode" required autofocus>
              <label for="inputPostcode">Postcode</label>
            </div>

            <div class="form-label-group">
              <input type="text" id="inputAccessCode" value="'.$_SESSION["accessCode"].'" class="form-control form-control-facility" name="inputAccessCode" placeholder="Facility Access Code" readonly>
              <label for="inputAccessCode">Facility Access Code</label>
            </div>


            <div>
              <button class="btn btn-lg btn-cyan btn-block" type="submit" name="change-facility-info-submit">Update Information</button>
            </div>
            
            '; ?>

          </form>
        </main>
      </div>
    </div>

    <div class="filler"></div>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>