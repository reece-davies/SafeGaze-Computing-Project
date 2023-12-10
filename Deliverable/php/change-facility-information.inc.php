<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['change-facility-info-submit']))
{
    require 'dbh.inc.php';

    //$memberId = $_POST['memberid'];
    $facilityId = $_POST['facilityid'];

    $facilityName = $_POST['inputFacilityName'];
    $facilityTelephone = $_POST['inputTelNo'];
    $facilityAddress = $_POST['inputStreetAddress'];
    $facilityPostcode = $_POST['inputPostcode'];

    $sql = "UPDATE facilities SET facility_name = '".$facilityName."', telephone = '".$facilityTelephone."', address = '".$facilityAddress."', postcode = '".$facilityPostcode."' WHERE facility_id = '".$facilityId."'";
    $stmt = mysqli_stmt_init($conn);

    if (empty($facilityName) || empty($facilityTelephone) || empty($facilityAddress) || empty($facilityPostcode))
    {
        header("Location: ../facility.php?error=emptyfields");
        exit(); 
    }
    else
    {

        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../facility.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_execute($stmt);            
            
            //header("Location: ../requests.php");
            header("Location: ../facility.php?submit=success");
            exit();
        }

    }

}
else
{
    header("Location: ../facility.php");
    exit();
}

?>