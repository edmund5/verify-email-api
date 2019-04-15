<?php
/**
 * Verify Email API for ManyChat
 * Created by Edmund Cinco
 * Website: https://www.edmundcinco.com
 */

session_id($_SERVER['HTTP_PSID']); // session id
session_start();

// user input
$verification_code = $_SERVER['HTTP_VERIFICATIONCODE'];

// retrieve $_SESSION["challenge_code"] based on session id and compare with $verification_code provided by the user
if ($_SESSION["challenge_code"] == $verification_code) {
    
    $json = '{
            "version": "v2",
            "content": {
                "actions": [
                    {
                      "action": "set_field_value",
                      "field_name": "verification_status",
                      "value": "success"
                    }
                ]
            }
          }';

} else {
    
    $json = '{
            "version": "v2",
            "content": {
                "actions": [
                    {
                      "action": "set_field_value",
                      "field_name": "verification_status",
                      "value": "failed"
                    }
                ]
            }
          }';

}

echo $json;

session_destroy();
