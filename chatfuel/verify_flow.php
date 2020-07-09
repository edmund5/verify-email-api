<?php
/**
 * Verify Email API for Chatfuel
 * Created by Edmund Cinco
 * Website: https://www.edmundcinco.com
 */

session_id($_POST['messenger_user_id']); // session id
session_start();

// user input
$verification_code = $_POST['verification_code'];

// retrieve $_SESSION["challenge_code"] based on session id and compare with $verification_code provided by the user
if ($_SESSION["challenge_code"] == $verification_code) {
    
    $json = '{
				  "set_attributes":
				    {
				      "status": "success"
				    }
				}';

} else {
    
    $json = '{
				  "set_attributes":
				    {
				      "status": "failed"
				    }
				}';

}

echo $json;

session_destroy();
