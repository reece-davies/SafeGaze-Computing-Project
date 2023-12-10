<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['create-message-submit']))
{

    require 'dbh.inc.php';
    
    $facilityId = $_POST['facilityid'];
    $inputTitle = $_POST['inputtitle'];;
    $inputUrgency = $_POST['inputurgency'];
    $inputContent = $_POST['inputcontent'];
    
    $sql = "INSERT INTO messages (facility_id, message_title, urgency_level, message_notes) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../messages.php?error=sqlerror");
        exit();
    }
    else
    {

        //mysqli_stmt_bind_param($stmt, "ssss", $facilityId, $inputTitle, $refinedURL, $inputNotes); // Lorem ipsum - with refined URL
        mysqli_stmt_bind_param($stmt, "ssss", $facilityId, $inputTitle, $inputUrgency, $inputContent);
        mysqli_stmt_execute($stmt);
        
        header("Location: ../messages.php?submit=success");
        exit();
    }
}
else if (isset($_POST['delete-message-submit'])) // Lorem ipsum - not implemented
{
    require 'dbh.inc.php';

    $messageId = $_POST['messageid'];

    $sql = "DELETE FROM messages WHERE message_id = '".$messageId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../messages.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../messages.php?submit=success");
        exit();
    }
}
else
{
    header("Location: ../messages.php");
    exit();
}

?>