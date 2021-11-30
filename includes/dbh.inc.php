<?php

$serverName = "localhost";
$dBUserName = "u876895317_uoc_Admin";
$dBPassword = "1^wo3tsL";
$dBName = "u876895317_uoc_db";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}