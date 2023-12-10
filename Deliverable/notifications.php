<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <main role="main" class="container">
      
        <h2>Notifications</h2>

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







          // Get messages from DB and display them
          $sql = "SELECT * FROM messages where facility_id=" . $facilityId . " ORDER BY message_id DESC";
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


              if (mysqli_num_rows($result)==0)
              {
                echo '* No Messages Issued By Your Facility *
                <div class="filler"></div>';
              }


              while ($row = mysqli_fetch_assoc($result))
              {
                if ($row["message_notes"] == null)
                {
                  $row["message_notes"] = "NULL";
                }

                //$facilityId;
                $messageId = $row["message_id"];
                //$messageTitle = $row["message_title"];
                //$urgencyLevel = $row["urgency_level"];
                //$messageNotes = $row["message_notes"];

                $confirmation = "return confirm('Are you sure you want to delete this message?');";

                echo '
                <a class="list-group-item list-group-item-action flex-column align-items-start ">
                
                  <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">'.$row["message_title"].'</h5>
                  </div>
                ';

                  if ($row["urgency_level"] == "urgent")
                  {
                    echo '
                  <p class="mb-1">Urgency: <span class="urgency-urgent"><b>Urgent</b></span></p>
                  <p class="mb-1">'.$row["message_notes"].'</p>
                  <div>
                  </div>
                </a>
                ';
                  }
                  else if ($row["urgency_level"] == "medium")
                  {
                    echo '
                  <p class="mb-1">Urgency: <span class="urgency-medium"><b>Medium</b></span></p>
                  <p class="mb-1">'.$row["message_notes"].'</p>
                  <div>
                  </div>
                </a>
                ';
                  }
                  else
                  {
                    echo '
                  <p class="mb-1">Urgency: <span class="member-colour"><b>Low</b></span></p>
                  <p class="mb-1">'.$row["message_notes"].'</p>
                  <div>
                  </div>
                </a>
                ';
                  }

                  
              }
                                    
          }







        }


        

        

      ?>


    </main>

    <div class="filler"></div>

    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>