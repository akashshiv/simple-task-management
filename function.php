<?php
  
   function is_loggedin() {
  if (isset($_SESSION['username']) === true) {
    return true;
  } else
  return false;
}

?>