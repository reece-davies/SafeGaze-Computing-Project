<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <?php

        $livestreamId = $_GET['livestreamid'];
        //echo '<p>Member ID = '. $memberId .'</p>';

        require 'php/dbh.inc.php';


        $sql = "SELECT * FROM livestreams where facility_id=" . $_SESSION['facilityId'] . " AND livestream_id=" . $livestreamId;
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

          $noValue = TRUE;
                            
          while ($row = mysqli_fetch_assoc($result))
          {
            // echo '<h1 onclick="changeProgramme('. $proId . ')" class="wow fadeInUp" data-wow-delay="0.1s" style="cursor: pointer;">'. $row["programme_title"] . '</h1>';

            //$memberId;
            $livestreamTitle = $row["livestream_title"];
            $livestreamLink = $row["livestream_link"];
            $livestreamNotes = $row["livestream_notes"];
            
            $noValue = FALSE;
          }
        }

        // If the value does not exist or belongs to someone else
        if ($noValue == TRUE)
        {
          echo '<h1 data-wow-delay="0.1s" style="color: red;"> THERE HAS BEEN AN ERROR </h1>';
          exit();
        }
        
        ?>

    <main role="main" class="container">
        
    <h2>Edit Livestream</h2>


    <form action="./php/manage-livestreams.inc.php" method="post">

    <?php include ("./inc/login-errors.inc.php"); ?>

    <?php
    echo '
    <div class="video-container">
      <iframe class="video-content" src="https://www.youtube.com/embed/'.$livestreamLink.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    ';
    echo '

      <br>
      <input type="hidden" name="livestreamid" value="'.  $livestreamId .'">
    

      <div class="form-label-group">
        <input type="text" id="inputtitle" value="'.$livestreamTitle.'" class="form-control form-control-facility" name="inputtitle" placeholder="Title" required autofocus>
        <label for="inputtitle">Title</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputurl" value="https://youtu.be/'.$livestreamLink.'" class="form-control form-control-facility" name="inputurl" placeholder="URL" required autofocus>
        <label for="inputurl">URL</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="inputnotes" value="'.$livestreamNotes.'" class="form-control form-control-facility" name="inputnotes" placeholder="Notes (optional)">
        <label for="inputnotes">Notes (optional)</label>
      </div>

      <div>
        <button class="btn btn-lg btn-cyan btn-block" type="submit" name="edit-livestream-submit">Change Livestream Details</button>
      </div>
      '; 

      ?>
      
    </form>

    </main>



    <div class="filler"></div>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>