<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');



// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Save User
        
        $_SESSION['user_id'] = 0;
        $this->view['response'] = 'Logged out';



        
        // // In the case of the Ajax Controller, the view is an array
        // // which can can be accessed as follows. This array will be
        // // converted to JSON when this script ends and sent to the client
        // // automatically
    
    }

}
$controller = new Controller();




