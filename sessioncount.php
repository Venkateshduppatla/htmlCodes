<?php 
if(session_status() === PHP_SESSION_NONE) 
{
session_start();
// $_SESSION["Credits"] = 0;
} 
session_start();

if($_SESSION["Credits"] >= 50)
{
  $_SESSION["Credits"]=0;
}
$_SESSION["Credits"]+=5;

echo $_SESSION["Credits"] . "\n";
session_destroy();
?>


