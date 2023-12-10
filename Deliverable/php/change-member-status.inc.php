<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['accept-member-submit']))
{
    require 'dbh.inc.php';

    $memberId = $_POST['memberid'];

    $sql = "UPDATE members SET status = 'active' WHERE member_id = '".$memberId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../requests.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        //header("Location: ../requests.php");
        header("Location: ../manage-member.php?memberid=" . $memberId);
        
        exit();
    }
}
else if (isset($_POST['decline-member-submit']))
{
    require 'dbh.inc.php';

    $memberId = $_POST['memberid'];

    $sql = "UPDATE members SET status = 'declined' WHERE member_id = '".$memberId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../requests.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../requests.php");
        
        exit();
    }
}
else if (isset($_POST['change-member-status-submit']))
{
    require 'dbh.inc.php';

    $memberId = $_POST['memberid'];
    $memberStatus = $_POST['inputStatus'];

    $sql = "UPDATE members SET status = '".$memberStatus."' WHERE member_id = '".$memberId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../active-members.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../active-members.php");
        
        exit();
    }
}
else if (isset($_POST['change-member-times-submit']))
{
    echo "TESTING";

    // LOREM IPSUM: need to change this for new structure.
    // Gets all day input boxes.
    // If = default value "0" -> exit
    // If not 0, post time to DB table (variable value)

    // Something is wrong with declaring array, or looping through array
    // https://www.php.net/manual/en/language.types.array.php
    // https://www.php.net/manual/en/control-structures.foreach.php

    require 'dbh.inc.php';

    $memberId = $_POST['memberid'];
    $startTime = $_POST['inputStartTime'];
    $endTime = $_POST['inputEndTime'];
    $daysArray = array(
        $_POST['defaultCheckMon'], 
        $_POST['defaultCheckTue'], 
        $_POST['defaultCheckWed'], 
        $_POST['defaultCheckThu'], 
        $_POST['defaultCheckFri'], 
        $_POST['defaultCheckSat'], 
        $_POST['defaultCheckSun']
    );
    echo $memberId;
    echo $startTime;
    echo $endTime;

    foreach($daysArray as $result) {
        echo $result, '<br>';
    }

    echo '-----------------<br>step 1 <br>';
    foreach ($daysArray as $day)
    {
        echo 'step 2 (',$day,')<br>';
        if ($day == '0')
        {
            echo 'step 3 <br>';
            //break;
            continue;
        }
        else
        {
            echo 'step 4 <br>';
            //$sql = "INSERT INTO table (id, name, age) VALUES(1, 'A', 19) ON DUPLICATE KEY UPDATE name='A', age=19";
            //$sql = "DELETE FROM ".$dayName." WHERE access_id = '".$accessId."'";
            $sql = "INSERT INTO ".$day." (member_id, start_time, end_time) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                echo $sql;
                //header("Location: ../active-members.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sss", $memberId, $startTime, $endTime);
                mysqli_stmt_execute($stmt);
                
                //header("Location: ../active-members.php?submit=success");

                //header("Location: ../manage-member.php?memberid=".$memberId."&submit=success");
                //exit();

                echo 'Variable ', $day, ' completed. <br>';

            }
        }
    }
    //exit(); // For displaying script's echos for troubleshooting


    header("Location: ../manage-member.php?memberid=".$memberId."&submit=success");
    exit();
}
else if (isset($_POST['change-member-times-submit(OLD)']))
{

    // Things to do for this (DONE)
    // (1) 1. Add variables for all the checkboxes
    // (1) 2. Set the variables to true/false depending on whether they have been checked or not
    // (1) 3. Loop through database and reset/remove everything currently set for member's training times
    // (1) 4. Run new query for posting member's new training times
    
    // (1) 5. DB structure might be new row per member training time... or per column (boolean)

    require 'dbh.inc.php';

    $memberId = $_POST['memberid'];
    $time09 = $_POST['defaultCheck09'];
    $time10 = $_POST['defaultCheck10'];
    $time11 = $_POST['defaultCheck11'];
    $time12 = $_POST['defaultCheck12'];
    $time13 = $_POST['defaultCheck13'];
    $time14 = $_POST['defaultCheck14'];
    $time15 = $_POST['defaultCheck15'];
    $time16 = $_POST['defaultCheck16'];
    $time17 = $_POST['defaultCheck17'];
    $time18 = $_POST['defaultCheck18'];
    $time19 = $_POST['defaultCheck19'];
    $time20 = $_POST['defaultCheck20'];

    //$sql = "INSERT INTO table (id, name, age) VALUES(1, 'A', 19) ON DUPLICATE KEY UPDATE name='A', age=19";
    $sql = "INSERT INTO training_times (member_id, nine_am, ten_am, eleven_am, twelve_pm, one_pm, two_pm, three_pm, four_pm, five_pm, six_pm, seven_pm, eight_pm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE nine_am=?, ten_am=?, eleven_am=?, twelve_pm=?, one_pm=?, two_pm=?, three_pm=?, four_pm=?, five_pm=?, six_pm=?, seven_pm=?, eight_pm=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../active-members.php?error=sqlerror");
        exit();
    }
    else
    {
        //mysqli_stmt_execute($stmt);            
        
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssss", $memberId, $time09, $time10, $time11, $time12, $time13, $time14, $time15, $time16, $time17, $time18, $time19, $time20, $time09, $time10, $time11, $time12, $time13, $time14, $time15, $time16, $time17, $time18, $time19, $time20);
        mysqli_stmt_execute($stmt);
        
        header("Location: ../active-members.php?submit=success");
        exit();

    }
}
else if (isset($_POST['delete-access-time-submit']))
{
    
    require 'dbh.inc.php';

    $accessId = $_POST['accessId'];
    $dayName = $_POST['dayName'];
    $memberId = $_POST['memberId'];

    $sql = "DELETE FROM ".$dayName." WHERE access_id = '".$accessId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../active-members.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../manage-member.php?memberid=".$memberId."&submit=success");
        exit();
    }
}
else
{
    header("Location: ../requests.php");
    exit();
}

?>