<?php
session_start();
include("shared.php");
// Destroying All Sessions
if(session_destroy())
{
 $url = "http://ctec4321.tkn7277.uta.cloud/termproject/login.php";
 GoToNow($url);
}
?>