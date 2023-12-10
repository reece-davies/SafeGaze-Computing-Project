<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['login-member-submit']))
{
    require 'dbh.inc.php';

    $inputEmail = $_POST['inputEmail']; // email address or username
    $inputPassword = $_POST['inputPassword'];

    if (empty($inputEmail) || empty($inputPassword))
    {
        header("Location: ../login-member.php?error=emptyfields");
        exit();
    }
    else
    {
        //$sql = "SELECT * FROM users where username=? OR email_address=?";
        $sql = "SELECT * FROM members where member_username=? OR email_address=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../login-member.php?error=sqlerror");
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
                    // Lorem ipsum - remove values from url
                    header("Location: ../login-member.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true)
                {
                    session_start();
                    $_SESSION['memberId'] = $row['member_id'];
                    $_SESSION['memberUsername'] = $row['member_username'];
                    //$_SESSION['accessCode'] = $row['access_code'];
                    $_SESSION['memberStatus'] = $row['status'];

                    header("Location: ../verify-member.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../login-member.php?error=wrongpwd");
                    exit();
                }
            }
            else 
            {
                header("Location: ../login-member.php?error=nouser");
                exit();
            }
        }
    }

}
else
{
    header("Location: ../login-member.php");
    exit();
}

?>