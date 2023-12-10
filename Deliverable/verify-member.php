<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <main role="main" class="container">
      <div class="jumbotron" style="text-align: center;">
        <!--
        <h1>Member verification page</h1>
        <p class="lead">Lorem ipsum</p>
        -->


      <?php
        require 'php/dbh.inc.php';

        $sql = "SELECT status FROM members where member_id=" . $_SESSION['memberId'];
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
          //header("Location: /deliverable/index.php?error=sqlerror");
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
            $memberStatus = $row["status"];
          }
        }

        // Lorem ipsum - Change the output depending on what the user's status is set to
        if ($memberStatus == "pending")
        {
          //echo '------------------------- <br> Member is PENDING <br> -------------------------';
          echo '
          <h2>Your account is: <span style="color: orange;">PENDING</span></h2>
          <p class="lead">Please be patient. Your facility has received your request for an account.</p>
          ';
        }
        elseif ($memberStatus == "declined")
        {
          //echo '------------------------- <br> Member is DECLINED <br> -------------------------';
          echo '
          <h2>Your account has been: <span style="color: red;">DECLINED</span></h2>
          <p class="lead">Your facility has declined your request for an account.</p>
          ';
        }
        elseif($memberStatus == "inactive")
        {
          //echo '------------------------- <br> Member is INACTIVE <br> -------------------------';
          echo '
          <h2>Your account has been: <span style="color: red;">DISABLED</span></h2>
          <p class="lead">Your facility has disabled your account. If there is a problem, please contact your facility.</p>
          ';
        }
        elseif($memberStatus == "active")
        {
          echo '
          <h2>Your account: <span style="color: green;">ACTIVE</span></h2>
          <p class="lead">Changing header information.</p>
          <body onload="letMemberIn()">
          ';
          //header("Location: /deliverable/livestream.php");
          exit();
        }

      ?>

      </div>

      <div class="filler"></div>

    </main>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>