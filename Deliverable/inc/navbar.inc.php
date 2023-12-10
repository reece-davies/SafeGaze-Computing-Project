<!DOCTYPE html>
<html lang = "en">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <!--<img src="../images/icons/Logo-2b2b2b.jpg" id="logo" style="height: 100px; width: 100px;"/>-->

    <?php 
    if (isset($_SESSION['facilityId']))
    {
        // For logo
        echo '<a class="navbar-brand" href="" style="color: #00aeda; font-weight: bold; padding-right: 5rem;">
        <img src="./images/icons/Logo-facility-cropped.png" class="navbar-logo" />
        </a>';

        // For text
        /*echo '<a class="navbar-brand" href="/deliverable/index.php" style="color: #00aeda; font-weight: bold;">
        SafeGaze</a>';*/
    }
    else if (isset($_SESSION['memberId']))
    {
        // For logo
        echo '<a class="navbar-brand" href="" style="color: #00aeda; font-weight: bold; padding-right: 5rem;">
        <img src="./images/icons/Logo-member-cropped.png" class="navbar-logo" />
        </a>';

        // For text
        /*echo '<a class="navbar-brand member-colour" href="/deliverable/index.php" style="color: #28a745; font-weight: bold;">SafeGaze</a>';*/
    }
    else
    {
        // For logo
        echo '<a class="navbar-brand" href="/deliverable/index.php" style="color: #00aeda; font-weight: bold; padding-right: 5rem;">
        <img src="./images/icons/Logo-white-cropped.png" class="navbar-logo" />
        </a>';

        // For text
        /*echo '<a class="navbar-brand" href="/deliverable/index.php">SafeGaze</a>';*/
    }
    
    ?>
    <!-- <a class="navbar-brand" href="/deliverable/index.php">SafeGaze</a> -->

    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
            if (isset($_SESSION['facilityId']))
            {
                if ($_SERVER['REQUEST_URI'] != "/deliverable/getting-started.php" && $_SERVER['REQUEST_URI'] != "/deliverable/getting-started.php?login=success")
                {
                    echo '
                    <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    ';
                }
            }

        ?>

    </div>


        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Templates for login buttons
            <a class="btn btn-outline-cyan my-2 my-sm-0" href="login-facility.php">Facility Login</a>
            <br>
            <a class="btn btn-outline-success my-2 my-sm-0" href="login-member.php">Member Login</a>
            -->

            <!-- echo '<form action="php/logout.inc.php" method="post">  <button href="#" class="btn btn-outline-cyan my-2 my-sm-0" type="submit" name="logout-submit"> Logout </button> </form>'; -->

            <?php 
                    if (isset($_SESSION['facilityId']))
                    {
                        echo '
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="getting-started.php">Getting started<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="active-members.php">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="manage-livestreams.php">Livestreams</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="facility.php">Manage facility</a>
                            </li>
                        </ul>
                            
                        <form action="php/logout.inc.php" method="post">  <button href="#"  class="btn btn-actions btn-outline-cyan my-2 my-sm-0" type="submit" name="logout-submit"> Logout </button> </form>
                        ';
                    }
                    elseif (isset($_SESSION['memberId']))
                    {
                        echo '
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="livestream.php">Livestreams<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="facility-info.php">Facility information</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="notifications.php">Notifications</a>
                            </li>
                        </ul>
                            
                        <form action="php/logout.inc.php" method="post">  <button href="#" class="btn btn-actions btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit"> Logout </button> </form>
                        ';
                    }
                    else
                    {

                        echo '
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                                </li>
                            </ul>

                            <a class="btn btn-actions btn-light my-2 my-sm-0" href="login-facility.php">Facility Login</a>
                            <br>
                            <a class="btn btn-actions btn-outline-light my-2 my-sm-0" href="login-member.php">Member Login</a>
                        ';
                    }
                    
            ?>

        </div>
    </nav>

</html>