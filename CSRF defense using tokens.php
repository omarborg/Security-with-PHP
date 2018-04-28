<?php
//Call session_start()

// function to generate a token for users to avoid CSRF attacks
function csrf_token() {
  return md5(uniqid(rand(), TRUE));
}

// function to generate and store token in user's session
function create_csrf_token() {
  $token = csrf_token();
  $_SESSION['csrf_token'] = $token;
  $_SESSION['csrf_token_time'] = time();
  return $token;
}

// function to destroy token by removing it from session
function destroy_csrf_token(){
  $_SESSION['csrf_token'] = null;
  $_SESSION['csrf_token_time'] = null;
  return true;
}

// function to use token in an HTML form
// use case: echo csrf_token_tag();
function csrf_token_tag(){
  $token = create_csrf_token();
  return "<input type=\"hidden\" name=\"csrf_token\" value=\"".$token."\">";
}

//function to check token if token provided by user is valid
function csrf_token_isValid(){
  if(isset($_POST['csrf_token'])){
    $user_token = $_POST['csrf_token'];
    $stored_token = $_SESSION['csrf_token'];
    return $user_token == $stored_token;
  } else {
    return false;
  }
}

// function to kill token on validity failure
function die_on_token_notValid(){
  if(!csrf_token_isValid()){
    die("CSRF token validation failed.");
  }
}

// function to check if token is recent
function csrf_token_isRecent(){
  $max_elapsed = 60; // setting the max time to 1 minute
  if(isset($_SESSION['csrf_token_time'])){
    $stored_time = $_SESSION['csrf_token_time'];
    return ($stored_time + $max_elapsed) >= time();
  } else {
    //remove expired token
    destroy_csrf_token();
    return false;
  }
}

 ?>
