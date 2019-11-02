<?php
print_r( $_POST);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';    
echo $contentType;
    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));
        echo $content;

        $decoded = json_decode($content, true);
      
        //If json_decode failed, the JSON is invalid.
        if(! is_array($decoded)) {
      
        } else {
          // Send error back to user.
        }
      }
      else{
          echo "failed";
      }
?>