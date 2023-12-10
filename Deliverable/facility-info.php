<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <main role="main" class="container">
      
        <h2>Your Facility's Information</h2>

      <?php

        require 'php/dbh.inc.php';

        $sql = "SELECT status FROM members where member_id=" . $_SESSION['memberId'];
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
          
          header("Location: /deliverable/index.php?error=sqlerror");
          exit();
        }
        else
        {
          //mysqli_stmt_bind_param($stmt, s, $_SESSION['userId']);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          while ($row = mysqli_fetch_assoc($result))
          {
            $memberStatus = $row["status"];
          }
        }

        if ($memberStatus != "active")
        {
          echo 'user is not active - TAKE THEM AWAY!';
          header("Location: /deliverable/verify-member.php");
          exit();
        }


        



        // Get facilityID from DB
        $sql = "SELECT facility_id FROM members where member_id=" . $_SESSION['memberId'];
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
          echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
          exit();
        }
        else
        {
          //mysqli_stmt_bind_param($stmt, s, $_SESSION['userId']);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          while ($row = mysqli_fetch_assoc($result))
          {
            $facilityId = $row["facility_id"];
            //echo 'Facility ID = '. $facilityId;
          }


          // Get all facility's info from DB
          $sql = "SELECT * FROM facilities where facility_id=" . $facilityId;
          $stmt = mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql))
          {
            echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
            exit();
          }
          else
          {
            //mysqli_stmt_bind_param($stmt, s, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result))
            {
              //$facilityId = $row["facility_id"];
              $facilityName = $row["facility_name"];
              $facilityUsername = $row["facility_username"];
              $facilityAccessCode = $row["access_code"];
              $facilityEmail = $row["email_address"];
              $facilityAddress = $row["address"];
              $facilityPostcode = $row["postcode"];
              $facilityTelephone = $row["telephone"];
            }

            // Echo details
            echo '
            <!--<h2>Member : <a class="facility-colour isDisabled">NAME</a></h2>-->

            <div style="padding-top: 1rem; padding-bottom: 1rem;">
              <ul class="list-group">
                <!-- <li class="list-group-item active">Member ID: </li> -->
                <li class="list-group-item"><b>Facility name: </b>'.$facilityName.'</li>
                <li class="list-group-item"><b>Facility username: <div style="display: inline;" class="facility-colour">'.$facilityUsername.'</div></b></li>
                <li class="list-group-item"><b>Facility email address: </b>'.$facilityEmail.'</li>
                <li class="list-group-item"><b>Facility telephone number: </b>'.$facilityTelephone.'</li>
                <li class="list-group-item"><b>Facility street address: </b>'.$facilityAddress.'</li>
                <li class="list-group-item"><b>Facility postcode: </b>'.$facilityPostcode.'</li>
                <li class="list-group-item"><b>Access code: </b>'.$facilityAccessCode.'</li>
              </ul>
            </div>';
          }

        }


        

        

      ?>


    </main>

    <div class="filler"></div>

    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>