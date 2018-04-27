<?php

//sanitize function for HTML output
function h($string){
  return htmlspecialchars($string);
}
//sanitize function for JavaScript output
function j($string){
  return json_encode($string);
}

//sanitize function for URLs
function u($string){
  return urlencode($string);
}

// usage examples
// for HTML
//echo h("<h1>Test</h1><br />");
// for Json
//echo j("'}; alert('Gotcha!'); //");
// for URLs
//echo u("?title=working? Or not?");

 ?>
