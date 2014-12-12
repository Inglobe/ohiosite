<?php
require_once("session.php");
include("function.php");
include("db_connect.php");
?>
<html>
    <head>
        <title>Volunteer Hours</title>
        <LINK href="/hockey.css" rel="stylesheet" type="text/css">
    </head>
<body>
<?php
    //displays the table
    displayTable();
?>
<?php
    //add event button shown only when logged in
if(isset($_SESSION['user_id'])){
    echo "<FORM METHOD=\"Link\" ACTION=\"addEvent.php\">
    <INPUT TYPE=\"submit\" VALUE=\"Add Event\">
    </FORM>";
}

echo "<br />";
    //login button shown if not logged in
if(!isset($_SESSION['user_id'])){
     echo "<a href=\"login.php\">Admin Login</a>";
}
    //logout button shown only when logged in
if(isset($_SESSION['user_id'])){
    echo "<a href=\"logout.php\">Logout</a>" . "<br />";
    echo "<a href=\"createUser.php\">Create a new Username and Password</a>"
    ;
}
?>
</body>
</html>