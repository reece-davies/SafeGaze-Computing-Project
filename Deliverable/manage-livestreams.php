<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("./inc/side-navbar.inc.php"); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <h2>Create New Livestream</h2>


        <form action="./php/manage-livestreams.inc.php" method="post">

        <?php include ("./inc/login-errors.inc.php"); ?>

        <?php echo '<input type="hidden" name="facilityid" value="'.  $_SESSION['facilityId'] .'">'; ?>

          <div class="form-label-group">
            <input type="text" id="inputtitle" class="form-control form-control-facility" name="inputtitle" placeholder="Title" required autofocus>
            <label for="inputtitle">Title</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputurl" class="form-control form-control-facility" name="inputurl" placeholder="URL" required autofocus>
            <label for="inputurl">URL</label>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputnotes" class="form-control form-control-facility" name="inputnotes" placeholder="Notes (optional)">
            <label for="inputnotes">Notes (optional)</label>
          </div>

          <div>
            <button class="btn btn-lg btn-cyan btn-block" type="submit" name="create-livestream-submit">Create Livestream</button>
          </div>
           
        </form>


        <h2 style="padding-top: 3rem;">Existing Livestreams</h2>

        <!--
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
            <div class="d-flex w-100 justify-content-between">
              <h4 class="mb-1">Livestream title</h5>
              
              <form action="php/change-member-status.inc.php" method="post">
              <input type="text" name="livestreamid" value="'. lorem ipsum - livestream ID .'">
                      
                <button onclick="editLivestream(livestreamid)" class="btn btn-sm btn-actions btn-cyan">Edit</button>
                <button class="btn btn-sm btn-actions btn-danger" type="submit" name="delete-livestream-submit">Delete</button>
              </form>
            </div>
            <p class="mb-1">Livestream ID</p>
            <p class="mb-1">Livestream notes</p>
            <div>
              <iframe class="facility-livestream" src="https://www.youtube.com/embed/BnpjhKG11Kg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </a>
        </div>
        -->

        <div class="list-group">
          
          <?php
          require 'php/dbh.inc.php';

          // Get livestreams from database and display them
          $sql = "SELECT * FROM livestreams where facility_id=" . $_SESSION['facilityId'];
          $stmt = mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmt, $sql))
          {
              //header("Location: ./manage-livestreams.php?error=sqlerror");
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
                echo '* No Livestreams Under Your Facility Name *
                <div class="filler"></div>';
              }


              while ($row = mysqli_fetch_assoc($result))
              {
                if ($row["livestream_notes"] == null)
                {
                  $row["livestream_notes"] = "NULL";
                }

                //$facilityId;
                $livestreamId = $row["livestream_id"];
                //$livestreamTitle;
                //$livestream_link;
                //$livestream_notes;

                /*
                echo "Facility ID = ".$row["facility_id"]."<br>";
                echo "Livestream ID = ".$livestreamId."<br>";
                echo "Title = ".$row["livestream_title"]."<br>";
                echo "Link = ".$row["livestream_link"]."<br>";
                echo "Notes = ".$row["livestream_notes"]."<br>";
                */

                $confirmation = "return confirm('Are you sure you want to delete this livestream?');";

                echo '
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                
                  <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">'.$row["livestream_title"].'</h5>
                    <form action="php/manage-livestreams.inc.php" method="post" onsubmit="'.$confirmation.'">
                      <input type="hidden" name="livestreamid" value="'. $livestreamId .'">
                      <div onclick="editLivestream('.$livestreamId.')" class="btn btn-sm btn-actions btn-cyan">Edit</div>
                      <button class="btn btn-sm btn-actions btn-danger" type="submit" name="delete-livestream-submit">Delete</button>
                    </form>
                  </div>
                  <p class="mb-1 facility-colour facility-livestream-url">https://youtu.be/'.$row["livestream_link"].'</p>
                  <p class="mb-1">'.$row["livestream_notes"].'</p>
                  <div>
                    <iframe class="facility-livestream-video" src="https://www.youtube.com/embed/'.$row["livestream_link"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>

                </a>

                ';
                /* Lorem ipsum - with refined YouTube URL
                echo '
                <div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/'.$row["livestream_link"].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                ';*/
                //echo "------------------ <br>";
              }
                                    
          }
          ?>


        </div>

        

        <br>

        <!-- Old code for displaying livestream
        <div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/BnpjhKG11Kg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        -->


        </main>
      </div>
    </div>


    


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>