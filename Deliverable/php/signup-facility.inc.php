<?php

if (isset($_POST['signup-facility-submit']))
{
    require 'dbh.inc.php';


    $inputEmail = $_POST['inputEmail'];
    $inputConfirmEmail = $_POST['inputConfirmEmail'];
    $inputPassword = $_POST['inputPassword'];
    $inputConfirmPassword = $_POST['inputConfirmPassword'];
    $inputUsername = $_POST['inputUsername'];
    $inputFacilityName = $_POST['inputFacilityName'];
    $inputTelephone = $_POST['inputTelephone'];
    $inputAddress = $_POST['inputAddress'];
    $inputPostcode = $_POST['inputPostcode'];
    $inputAccessCode = $_POST['inputAccessCode'];
    
    
    if (empty($inputEmail) || empty($inputConfirmEmail) || empty($inputPassword) || empty($inputConfirmPassword) || empty($inputUsername) || empty($inputFacilityName) || empty($inputTelephone) || empty($inputAddress) || empty($inputPostcode) || empty($inputAccessCode))
    {
        header("Location: ../signup-facility.php?error=emptyfields");
        exit(); 
    }
    else if ($inputPassword !== $inputConfirmPassword)
    {
        //header("Location: ../signup-facility.php?error=passwordcheck&inputUsername=".$inputUsername."&inputEmail=".$inputEmail);
        header("Location: ../signup-facility.php?error=passwordcheck");
        exit(); 
    }
    else if ($inputEmail !== $inputConfirmEmail)
    {
        //header("Location: ../signup-facility.php?error=emailcheck&inputUsername=".$inputUsername."&inputEmail=".$inputEmail);
        header("Location: ../signup-facility.php?error=emailcheck&inputUsername=".$inputUsername."&inputEmail=".$inputEmail);
        exit(); 
    }
    else
    {
        $sql = "SELECT facility_username FROM facilities WHERE facility_username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../signup-facility.php?error=sqlerror");
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
                header("Location: ../signup-facility.php?error=usernametaken");
                exit(); 
            }
            else
            {
                
                $sql = "SELECT email_address FROM facilities WHERE email_address=?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../signup-facility.php?error=sqlerror");
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
                        header("Location: ../signup-facility.php?error=emailtaken");
                        exit(); 
                    }
                    else
                    {
                        
                        $sql = "SELECT access_code FROM facilities WHERE access_code=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            header("Location: ../signup-facility.php?error=sqlerror");
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "s", $inputAccessCode);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $resultCheck = mysqli_stmt_num_rows($stmt);

                            if ($resultCheck > 0)
                            {
                                header("Location: ../signup-facility.php?error=accesscodetaken");
                                exit(); 
                            }
                            else
                            {
                                
                                //$sql = "INSERT INTO users (username, email_address, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)";
                                $sql = "INSERT INTO facilities (facility_name, facility_username, password, email_address, telephone, address, postcode, access_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                $stmt = mysqli_stmt_init($conn);

                                if (!mysqli_stmt_prepare($stmt, $sql))
                                {
                                    header("Location: ../signup-facility.php?error=sqlerror");
                                    exit();
                                }
                                else
                                {
                                    $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);

                                    mysqli_stmt_bind_param($stmt, "ssssssss", $inputFacilityName, $inputUsername, $hashedPassword, $inputEmail, $inputTelephone, $inputAddress, $inputPostcode, $inputAccessCode);
                                    mysqli_stmt_execute($stmt);
                                    
                                    ////////// Login //////////
                                    
                                    //$sql = "SELECT * FROM users where username=? OR email_address=?";
                                    $sql = "SELECT * FROM facilities where facility_username=? OR email_address=?";
                                    $stmt = mysqli_stmt_init($conn);

                                    if (!mysqli_stmt_prepare($stmt, $sql))
                                    {
                                        header("Location: ../signup-facility.php?error=sqlerror");
                                        exit();
                                    }
                                    else
                                    {
                                        mysqli_stmt_bind_param($stmt, "ss", $inputEmail, $inputEmail);
                                        mysqli_stmt_execute($stmt);

                                        $result = mysqli_stmt_get_result($stmt);

                                        if ($row = mysqli_fetch_assoc($result))
                                        {
                                            
                                            session_start();
                                            $_SESSION['facilityId'] = $row['facility_id'];
                                            $_SESSION['facilityUsername'] = $row['facility_username'];
                                            $_SESSION['accessCode'] = $row['access_code'];

                                            header("Location: ..//getting-started.php?signup=success");
                                            exit();

                                        }
                                        else 
                                        {
                                            header("Location: ../signup-facility.php?error=nouser");
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
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else
{
    header("Location: ../signup-facility.php");
    exit();
}


?>