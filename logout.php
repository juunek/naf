<?php
session_start();
include("shared_admin.php");

function GoToNow ($url){
    echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
}

// Destroying All Sessions
if(session_destroy())
{
 $url = "http://ctec4350.krk1266.uta.cloud/naf/login.php";
 GoToNow($url);
}
?>