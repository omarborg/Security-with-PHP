<?php
session_start();
require_once 'sanitize_functions.php';
require_once 'csrf_defense_using_tokens.php';

if(request_is_post()) {
  if(csrf_token_isValid()) {
    $message = "Valid Form Submission";
    if(csrf_token_isRecent()) {
      $message .= "(recent)";
    } else {
      $message .= "(not recent)";
    }
  } else {
    $message = "CSRF token is missing or missmatched";
  }
} else {
  
  //form not submitted or GET request 
  $message = "Please login.";
}
?>
