<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['login-facility-submit']))
{
    require 'dbh.inc.php';

    $inputEmail = $_POST['inputEmail']; // email address and username
    $inputPassword = $_POST['inputPassword'];

    if (empty($inputEmail) || empty($inputPassword))
    {
        header("Location: ../login-facility.php?error=emptyfields");
        exit();
    }
    else
    {
        //$sql = "SELECT * FROM users where username=? OR email_address=?";
        $sql = "SELECT * FROM facilities where facility_username=? OR email_address=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../login-facility.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $inputEmail, $inputEmail);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result))
            {
                $pwdCheck = password_verify($inputPassword, $row['password']);

                if ($pwdCheck == false)
                {
                    header("Location: ../login-facility.php?error=wrongpwd&pwdcheck=".$pwdCheck."&inputPassword=".$inputPassword."&inputEmail=".$inputEmail."&dbUsername=".$row['facility_username']."&dbEmail=".$row['email_address']."&dbPassword=".$row['password']);
                    exit();
                }
                else if ($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['facilityId'] = $row['facility_id'];
                    $_SESSION['facilityUsername'] = $row['facility_username'];
                    $_SESSION['accessCode'] = $row['access_code'];

                    header("Location: ../getting-started.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../login-facility.php?error=wrongpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../login-facility.php?error=nouser");
                exit();
            }
        }
    }

}
else
{
    header("Location: ../login-facility.php");
    exit();
}

?>