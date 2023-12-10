<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "safegaze"; // tutorial: loginsystemtut

/* 

--- For university DB login (expired) ---

$servername = "Proj-mysql.uopnet.plymouth.ac.uk";
$dBUsername = "COMP3001_RDavies";
$dBPassword = "EfcA555*";
$dBName = "comp3001_rdavies";

--- For A2 hosting DB login ---

$servername =  "localhost:3306"; // "safegaze.a2hosted.com/";
$dBUsername = "safegaze_reecedavies";
$dBPassword = "U9zHt*n5RhJx";
$dBName = "safegaze_database";

*/

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}


?>