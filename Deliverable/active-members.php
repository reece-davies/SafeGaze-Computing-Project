<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("./inc/side-navbar.inc.php"); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <h2>Active members</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead class="thead-dark">
              <tr>
                <th>Member ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Gender</th>
                <th>DOB</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php
              /*
              echo '
              <h2>'.$_SESSION['facilityId'].'</h2>
              <h2>'.$_SESSION['facilityUsername'].'</h2>
              <h2>'.$_SESSION['accessCode'].'</h2> <br>';
              */

              // Loop through database for members that have the same access code AND have status active
              require './php/dbh.inc.php';

              //$sql = "SELECT * FROM members where facility_id=" . $_SESSION['facilityId'] . " and status='active'";
              $sql = "SELECT * FROM members where facility_id=? and status='active'";
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
                  $memberId = $row["member_id"];
                  $memberFirstName = $row["first_name"];
                  $MemberLastName = $row["last_name"];
                  $memberUsername = $row["member_username"];
                  $memberEmail = $row["email_address"];
                  $memberGender = $row["gender"];
                  $memberDOB = $row["date_of_birth"];
                  
                  if ($memberGender == null)
                  {
                    $memberGender = "NULL";
                  }

                  if ($memberDOB == null)
                  {
                    $memberDOB = "NULL";
                  }

                  // <button type="button">Manage</button>
                  // <button onclick="manageUser(window.location = "./livestreams.php")" class="btn btn-sm btn-actions btn-cyan">Manage</button>
                  echo '
                  <tr>
                    <td>'. $memberId .'</td>
                    <td>'. $memberFirstName .'</td>
                    <td>'. $MemberLastName .'</td>
                    <td>'. $memberUsername .'</td>
                    <td>'. $memberEmail .'</td>
                    <td>'. $memberGender .'</td>
                    <td>'. $memberDOB .'</td>
                    <td><button onclick="manageUser('. $memberId . ')" class="btn btn-sm btn-actions btn-cyan">Manage</button></td>
                  </tr>
                  ';
                }
                
              }
              // End of database search
              ?>

            </tbody>
          </table>
        </div>
        </main>
      </div>
    </div>

    <div class="filler"></div>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>