<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <main role="main" class="container">
      
        <h2>Access Times</h2>

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

        
            //////////////////////////////// DISPLAY NEW ACCESS TIMES ////////////////////////////////
            $confirmation = "return confirm('Are you sure you want to remove this access time?');";

            ///////////////////////
            // TIME SLOT: MONDAY //
            ///////////////////////
            $sql = "SELECT * FROM mon_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div>
                <div class="row">
                  <div class="col">
                    <h5>Mon</h5>
                    <ul class="list-group">';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];
                //echo '<li class="list-group-item">'.$accessId.' - '.$startTime.' - '.$endTime.'</li>';

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';

                /*
                <form action="php/manage-livestreams.inc.php" method="post" onsubmit="'.$confirmation.'">
                  <input type="hidden" name="livestreamid" value="'. $livestreamId .'">
                  <div onclick="editLivestream('.$livestreamId.')" class="btn btn-sm btn-actions btn-cyan">Edit</div>
                  <button class="btn btn-sm btn-actions btn-danger" type="submit" name="delete-livestream-submit">Delete</button>
                </form>
                */
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                </div>';

            }

            ////////////////////////
            // TIME SLOT: TUESDAY //
            ////////////////////////
            $sql = "SELECT * FROM tue_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div class="col">
                  <h5>Tue</h5>
                  <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                </div>';

            }


            //////////////////////////
            // TIME SLOT: WEDNESDAY //
            //////////////////////////
            $sql = "SELECT * FROM wed_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div class="col">
                  <h5>Wed</h5>
                  <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                </div>
                </div>';

            }


            /////////////////////////
            // TIME SLOT: THURSDAY //
            /////////////////////////
            $sql = "SELECT * FROM thu_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div style="padding-top: 1.5rem;">
                <div class="row">
                  <div class="col">
                    <h5>Thu</h5>
                    <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                  </div>';

            }

            ///////////////////////
            // TIME SLOT: FRIDAY //
            ///////////////////////
            $sql = "SELECT * FROM fri_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div class="col">
                    <h5>Fri</h5>
                    <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                  </div>';

            }

            /////////////////////////
            // TIME SLOT: SATURDAY //
            /////////////////////////
            $sql = "SELECT * FROM sat_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div class="col">
                    <h5>Sat</h5>
                    <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                  </div>
                </div>
                
                </div>';

            }


            ///////////////////////
            // TIME SLOT: SUNDAY //
            ///////////////////////
            $sql = "SELECT * FROM sun_times where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

              echo '
              <div style="padding-top: 1.5rem;">
                  <div class="row">
                    <div class="col">
                      <h5>Sun</h5>
                      <ul class="list-group">
              ';
                                
              while ($row = mysqli_fetch_assoc($result))
              {
                $accessId = $row["access_id"];
                $startTime = $row["start_time"];
                $endTime = $row["end_time"];

                echo '
                <li class="list-group-item">
                    <input type="hidden" name="dayName" value="mon_times">
                    <input type="hidden" name="accessId" value="'. $accessId .'">
                    <input type="hidden" name="memberId" value="'. $_SESSION['memberId'] .'">
                    '. $startTime.' - '.$endTime.'
                </li>';
              }

              // $resultCheck = mysqli_stmt_num_rows($stmt);
              if (mysqli_num_rows ($result) == 0)
              {
                echo '<li class="list-group-item" style="color: red;">NULL</li>';
              }

              echo '
              </ul>
                    </div>

                    <div class="col">
                    </div>

                    <div class="col">
                    </div>
                  </div>
                </div>
              </div>';

            }

            //////////////////////////////////////////////////////////////////////////////////////////

            $access = False;

            // Step 1 - get what day it is
            $timestamp = time();
            $daySQL;

            if (date('D', $timestamp) === 'Mon')
            {
              //echo "It is Monday today <br>";
              $daySQL = "mon_times";
            }
            else if (date('D', $timestamp) === 'Tue')
            {
              //echo "It is Tuesday today <br>";
              $daySQL = "tue_times";
            }
            else if (date('D', $timestamp) === 'Wed')
            {
              //echo "It is Wednesday today <br>";
              $daySQL = "wed_times";
            }
            else if (date('D', $timestamp) === 'Thu')
            {
              //echo "It is Thursday today <br>";
              $daySQL = "thu_times";
            }
            else if (date('D', $timestamp) === 'Fri')
            {
              //echo "It is Friday today <br>";
              $daySQL = "fri_times";
            }
            else if (date('D', $timestamp) === 'Sat')
            {
              //echo "It is Saturday today <br>";
              $daySQL = "sat_times";
            }
            else if (date('D', $timestamp) === 'Sun')
            {
              //echo "It is Sunday today <br>";
              $daySQL = "sun_times";
            }

            
            // Step 2 - check whether within access time from database
            date_default_timezone_set('Europe/London');
            $currentTime = date("H:i");
            //echo "Current time = " . $currentTime . "<br>";


            $sql = "SELECT * FROM ".$daySQL." where member_id=" . $_SESSION['memberId'];
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
              //header("Location: /manage-member.php?error=sqlerror");
              echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
              exit();
            }
            else
            {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);

                                
              while ($row = mysqli_fetch_assoc($result))
              {
                //$accessId = $row["access_id"];
                //$startTime = $row["start_time"];
                //$endTime = $row["end_time"];
                
                if ($row["start_time"] <= $currentTime && $currentTime < $row["end_time"])
                {
                  //echo 'ACCESS GRANTED!';
                  $access = True;
                }
              }
            }

        
        // Display stream if member has access ($access == True)
        if ($access == True)
        {
          echo '
          <div class="jumbotron" style="text-align: center; margin-top: 2rem;">
            <h4>Current time: <span class="member-colour">'.$currentTime.'</span></h4>
            <h4 class="lead">Livestream enabled. You are within your access times.</h4>
          </div>

          <h2 style="padding-top: 20px; padding-bottom: 10px;">Available livestreams</h2>
          ';

          /////////////////////////////////////////////////////////////////////////////////////////
          // Get facility's ID relating this member
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
          }
          /////////////////////////////////////////////////////////////////////////////////////////

          // Get facility's name and username from DB
          $sql = "SELECT facility_name, facility_username FROM facilities where facility_id=" . $facilityId;
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
              $facilityName = $row["facility_name"];
              $facilityUsername = $row["facility_username"];
              //echo $facilityName . '<br>';
              //echo $facilityUsername;
            }
          }

          // Get facility's livestreams from DB
          $sql = "SELECT * FROM livestreams where facility_id=" . $facilityId;
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
              echo '
                <div class="list-group" style="padding-bottom: 1.5rem;">
                  <a class="list-group-item-member list-group-item list-group-item-action flex-column align-items-start" style="padding-bottom: 1.5rem;">
                    <div class="d-flex w-100 justify-content-between" style="padding-bottom: 0.8rem;">
                      <h3 class="member-livestream-title mb-1">'.$row["livestream_title"].'</h3>
                      <p>Posted by: <span class="facility-colour">'.$facilityName.' ('.$facilityUsername.')</span></p>
                    </div>

                    <p class="mb-1" style="padding-bottom: 1rem;">'.$row["livestream_notes"].'</p>

                    <div class="video-container"> <!-- Original source = https://www.youtube.com/embed/BnpjhKG11Kg --> 
                      <iframe class="video-content" src="https://www.youtube.com/embed/'.$row["livestream_link"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </a>
                </div>
              ';
            }
          }
          

          
        }
        else
        {
          echo '
          <div class="jumbotron" style="text-align: center; margin-top: 2rem;">
            <h4>Current time: <span style="color: red">'.$currentTime.'</span></h4>
            <h4 class="lead">Livestream disabled. You are outside your access times.</h4>
          </div>
          ';
        }

      ?>

      <!--
      <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/BnpjhKG11Kg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      -->

      
      <!-- https://stackoverflow.com/questions/39275889/how-to-embed-new-youtubes-live-video-permanent-url
      <div class="sqs-block embed-block sqs-block-embed" data-block-type="22" >
        <div class="sqs-block-content"><div class="intrinsic" style="max-width:100%">
            <div class="embed-block-wrapper embed-block-provider-YouTube" style="padding-bottom:56.20609%;">
                <iframe allow="autoplay; fullscreen" scrolling="no" data-image-dimensions="854x480" allowfullscreen="true" src="https://www.youtube.com/embed/live_stream?channel=UC869NIQAR-K5uvbTWz20Y2Q" width="854" data-embed="true" frameborder="0" title="YouTube embed" class="embedly-embed" height="480">
                </iframe>
            </div>
        </div>
      </div> -->

      <!--
        <div style="padding: 30px;">
          <h1> Livestream title </h1>
          <p> Livestream notes </p>
          <div class="video-container">
            <iframe class="video-content" src="https://www.youtube.com/embed/BnpjhKG11Kg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      -->

    </main>

    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>