<?php

if (isset($_POST['signup-member-submit']))
{
    require 'dbh.inc.php';


    $inputEmail = $_POST['inputEmail'];
    $inputConfirmEmail = $_POST['inputConfirmEmail'];
    $inputPassword = $_POST['inputPassword'];
    $inputConfirmPassword = $_POST['inputConfirmPassword'];
    $inputUsername = $_POST['inputUsername'];

    $inputFirstName = $_POST['inputFirstName'];
    $InputLastName = $_POST['inputLastName'];
    $inputDOB = $_POST['inputDOB'];             // LOREM IPSUM - CHECK
    $inputGender = $_POST['inputGender'];       // LOREM IPSUM - CHECK

    $inputAccessCode = $_POST['inputAccessCode'];
    
    
    if (empty($inputEmail) || empty($inputConfirmEmail) || empty($inputPassword) || empty($inputConfirmPassword) || empty($inputUsername) || empty($inputFirstName) || empty($InputLastName) || empty($inputDOB) || empty($inputGender) || empty($inputAccessCode))
    {
        header("Location: ../signup-member.php?error=emptyfields");
        exit(); 
    }
    else if ($inputPassword !== $inputConfirmPassword)
    {
        header("Location: ../signup-member.php?error=passwordcheck");
        exit(); 
    }
    else if ($inputEmail !== $inputConfirmEmail)
    {
        //header("Location: ../signup-facility.php?error=emailcheck&inputUsername=".$inputUsername."&inputEmail=".$inputEmail);
        header("Location: ../signup-member.php?error=emailcheck&inputUsername=".$inputUsername."&inputEmail=".$inputEmail);
        exit(); 
    }
    else
    {

        $sql = "SELECT member_username FROM members WHERE member_username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup-member.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $inputUsername);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0)
            {
                header("Location: ../signup-member.php?error=usernametaken");
                exit(); 
            }
            else
            {
                
                $sql = "SELECT email_address FROM members WHERE email_address=?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../signup-member.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $inputEmail);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);

                    if ($resultCheck > 0)
                    {
                        header("Location: ../signup-member.php?error=emailtaken");
                        exit(); 
                    }
                    else
                    {
                        
                        $sql = "SELECT facility_id FROM facilities WHERE access_code=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            header("Location: ../signup-member.php?error=sqlerror");
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "s", $inputAccessCode);
                            mysqli_stmt_execute($stmt);

                            $result = mysqli_stmt_get_result($stmt);

                            //mysqli_stmt_store_result($stmt);
                            //$resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($row = mysqli_fetch_assoc($result))
                            {
                                $facilityId = $row['facility_id'];
                            }
                            
                                
                            //$sql = "INSERT INTO facilities (facility_name, facility_username, password, email_address, telephone, address, postcode, access_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            $sql = "INSERT INTO members (facility_id, member_username, password, email_address, first_name, last_name, date_of_birth, gender, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql))
                            {
                                header("Location: ../signup-member.php?error=sqlerror");
                                exit();
                            }
                            else
                            {
                                $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);
                                $memberStatus = 'pending';

                                mysqli_stmt_bind_param($stmt, "sssssssss", $facilityId, $inputUsername, $hashedPassword, $inputEmail, $inputFirstName, $InputLastName, $inputDOB, $inputGender, $memberStatus);
                                mysqli_stmt_execute($stmt);
                                
                                ////////// Login //////////
                                
                                //$sql = "SELECT * FROM facilities where facility_username=? OR email_address=?";
                                $sql = "SELECT * FROM members where member_username=? OR email_address=?";
                                $stmt = mysqli_stmt_init($conn);

                                if (!mysqli_stmt_prepare($stmt, $sql))
                                {
                                    header("Location: ../signup-member.php?error=sqlerror");
                                    exit();
                                }
                                else
                                {
                                    mysqli_stmt_bind_param($stmt, "ss", $inputUsername, $inputEmail);
                                    mysqli_stmt_execute($stmt);

                                    $result = mysqli_stmt_get_result($stmt);

                                    if ($row = mysqli_fetch_assoc($result))
                                    {
                                        
                                        session_start();
                                        $_SESSION['memberId'] = $row['member_id'];
                                        $_SESSION['memberUsername'] = $row['member_username'];
                                        $_SESSION['memberStatus'] = $row['status'];

                                        header("Location: ../verify-member.php?signup=success");
                                        exit();

                                    }
                                    else 
                                    {
                                        header("Location: ../signup-member.php?error=nouser");
                                        exit();
                                    }
                                }


                                /*
                                session_start();
                                $_SESSION['userId'] = $row['user_id'];
                                $_SESSION['userUid'] = $row['username'];

                                header("Location: ../index.php?login=success");
                                exit();
                                */

                            }
                        }
                        
                    }
                }
                
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else
{
    header("Location: ../signup-member.php");
    exit();
}


?>