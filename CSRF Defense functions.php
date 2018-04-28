
<?php
//CSRF Defense using GET and POST functions
//GET requests should not make any changes to data.
//Only POST requests should be allowed to update or change data.

function request_is_get(){
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function request_is_post(){
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// These functions can be used later as follows
// if(request_is_post()) {
// ....... do desired action of posting data from a form or update database with values
// } else {
//    do something to prevent data manipulation, redirect, error message or page etc.
//}
//}

 ?>
