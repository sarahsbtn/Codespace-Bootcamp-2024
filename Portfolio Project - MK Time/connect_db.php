<?php # CONNECT TO MySQL DATABASE.

# Connect/Link  on 'localhost' .
$link = mysqli_connect('localhost','root','','mktime'); 
  if (!$link) { 
# Otherwise fail gracefully and explain the error. 
  die(''. mysqli_connect_error());
} 
    
