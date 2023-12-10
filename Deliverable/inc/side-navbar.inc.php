<!DOCTYPE html>
<html lang = "en">

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">

            <?php 

              if (strpos($_SERVER['REQUEST_URI'], '/active-members.php') !== false || strpos($_SERVER['REQUEST_URI'], '/requests.php') !== false || strpos($_SERVER['REQUEST_URI'], '/idle-members.php') !== false || strpos($_SERVER['REQUEST_URI'], '/manage-member.php') !== false)
              {
                  echo '
                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span class="facility-colour">Members</span>
                  </h6>

                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="active-members.php"> <!-- active -->
                        <span data-feather="home"></span>
                        Active members <span class="sr-only">(current)</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="requests.php">
                        <span data-feather="file"></span>
                        Requests
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="idle-members.php">
                        <span data-feather="shopping-cart"></span>
                        Idle members
                      </a>
                    </li>
                  </ul>
                  ';
              }
              elseif (strpos($_SERVER['REQUEST_URI'], "/manage-livestreams.php") !== False)
              {
                echo '
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span class="facility-colour">Livestreams</span>
                </h6>
                <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                    <a class="nav-link" href="manage-livestreams.php">
                      <span data-feather="file-text"></span>
                      Manage livestreams
                    </a>
                  </li>
                </ul>
                ';
              }
              elseif (strpos($_SERVER['REQUEST_URI'], "/facility.php") !== False || strpos($_SERVER['REQUEST_URI'], "/messages.php") !== False)
              {
                echo '
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span class="facility-colour">Facility</span>
                </h6>
                <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                    <a class="nav-link" href="facility.php">
                      <span data-feather="file-text"></span>
                      Facility Information
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="messages.php">
                      <span data-feather="file-text"></span>
                      Messages
                    </a>
                  </li>
                </ul>
                ';
              }
            ?>


          </div>
        </nav>

</html>