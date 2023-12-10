<?php

// Requires 
// 1. form action = <file name> (to run the file)
// 2. form submit = <post name> (to validate form submission)

if (isset($_POST['create-livestream-submit']))
{

    require 'dbh.inc.php';
    
    $facilityId = $_POST['facilityid'];
    $inputTitle = $_POST['inputtitle'];;
    $inputURL = $_POST['inputurl'];
    $inputNotes = $_POST['inputnotes'];

    /* Lorem ipsum - Stripping URL code process  */
    echo "Stripping URL code process: <br>";
    //$subject = 'https://youtu.be/ZZPPj83eqKw';
    //echo $subject . '<br>';
    $search = 'https://youtu.be/';
    //echo $search . '<br>';
    //$subject = str_replace($search, '', $subject) ;
    $refinedURL = str_replace($search, '', $inputURL);
    echo $refinedURL;


    // Lorem ipsum - not needed atm because if we use numerous hosting platforms, we will need where the link is coming from
    /* 
    // Removes https part of url to get just the link
    $search = 'https://www.youtube.com/embed/' ;

    if (strpos($inputURL, $search) !== false) {
        //echo 'true';
        $refinedURL = str_replace($search, '', $inputURL);
    }
    else
    {
        header("Location: ../manage-livestreams.php?error=urlerror");
        exit();
    }
    */
    
    
    //$sql = "INSERT INTO table (id, name, age) VALUES(1, 'A', 19) ON DUPLICATE KEY UPDATE name='A', age=19";
    //$sql = "INSERT INTO livestreams (facility_id, livestream_title, livestream_link, livestream_notes) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE facility_id=?, livestream_title=?, livestream_link=?, livestream_notes=?";
    $sql = "INSERT INTO livestreams (facility_id, livestream_title, livestream_link, livestream_notes) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../manage-livestreams.php?error=sqlerror");
        exit();
    }
    else
    {

        //mysqli_stmt_bind_param($stmt, "ssss", $facilityId, $inputTitle, $refinedURL, $inputNotes); // Lorem ipsum - with refined URL
        mysqli_stmt_bind_param($stmt, "ssss", $facilityId, $inputTitle, $refinedURL, $inputNotes);
        mysqli_stmt_execute($stmt);
        
        header("Location: ../manage-livestreams.php?submit=success");
        exit();
    }
}
else if (isset($_POST['delete-livestream-submit']))
{
    require 'dbh.inc.php';

    $livestreamId = $_POST['livestreamid'];

    $sql = "DELETE FROM livestreams WHERE livestream_id = '".$livestreamId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../manage-livestreams.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../manage-livestreams.php?submit=success");
        exit();
    }
}
else if (isset($_POST['edit-livestream-submit']))
{
    require 'dbh.inc.php';

    $livestreamId = $_POST['livestreamid'];
    $livestreamTitle = $_POST['inputtitle'];
    $livestreamLink = $_POST['inputurl'];
    $livestreamNotes = $_POST['inputnotes'];

    $sql = "DELETE FROM livestreams WHERE livestream_id = '".$livestreamId."'";
    $sql = "UPDATE livestreams SET livestream_title = '".$livestreamTitle."', livestream_link = '".$livestreamLink."', livestream_notes = '".$livestreamNotes."' WHERE livestream_id = '".$livestreamId."'";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../manage-livestreams.php?error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_execute($stmt);            
        
        header("Location: ../manage-livestreams.php?submit=success");
        exit();
    }
}
else
{
    header("Location: ../manage-livestreams.php");
    exit();
}

?>