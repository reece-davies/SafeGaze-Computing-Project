<!DOCTYPE html>
<html lang="en">

  <?php include ("./inc/head.inc.php"); ?>

  <body>
    <?php include ("./inc/navbar.inc.php"); ?>

    <div class="container-fluid">
      <div class="row">

        <?php include ("./inc/side-navbar.inc.php"); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <h2>Create New Message <div style="display: inline; color: #BABABA;"> (issued to all members)</div></h2>

        <form action="./php/manage-messages.inc.php" method="post">

        <?php include ("./inc/login-errors.inc.php"); ?>

        <?php echo '<input type="hidden" name="facilityid" value="'.  $_SESSION['facilityId'] .'">'; ?>

          <div class="row">
            <div class="col-sm">
              <div class="form-label-group">
                <input type="text" id="inputtitle" class="form-control form-control-facility" name="inputtitle" placeholder="Title" required autofocus>
                <label for="inputtitle">Title</label>
              </div>
            </div>
            <div class="col-sm">
              <select class="custom-select form-input-group" name="inputurgency" required>
                <option value="" selected>Select message urgency level</option>
                <option value="urgent">Urgent</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
              </select>
            </div>
          </div>

          <div class="form-label-group">
            <input type="text" id="inputcontent" class="form-control form-control-facility" name="inputcontent" placeholder="Contents" required autofocus>
            <label for="inputcontent">Contents</label>
          </div>

          <div>
            <button class="btn btn-lg btn-cyan btn-block" type="submit" name="create-message-submit">Notify Members</button>
          </div>
           
        </form>


        <h2 style="padding-top: 3rem;">Existing Messages</h2>


        <div class="list-group">
          
          <?php
          require 'php/dbh.inc.php';

          // Get messages from DB and display them
          $sql = "SELECT * FROM messages where facility_id=" . $_SESSION['facilityId'] . " ORDER BY message_id DESC";
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
                echo '* No Messages Under Your Facility Name *
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
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                
                  <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">'.$row["message_title"].'</h5>
                    <form action="php/manage-messages.inc.php" method="post" onsubmit="'.$confirmation.'">
                      <input type="hidden" name="messageid" value="'. $messageId .'">
                      <!--<div onclick="lorem ipsum('.$messageId.')" class="btn btn-sm btn-actions btn-cyan">Edit</div>-->
                      <button class="btn btn-sm btn-actions btn-danger" type="submit" name="delete-message-submit">Delete</button>
                    </form>
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
          ?>


        </div>

        <br>

        </main>
      </div>
    </div>


    <div class="filler"></div>


    <?php include ("./inc/footer.inc.php"); ?>
  </body>
</html>