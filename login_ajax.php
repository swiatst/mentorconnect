<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');
/*
if ($_SESSION['user_id']){
  header("Location: signup.php");
  exit();
}
*/
// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Save User
        $sql_user = "SELECT * FROM user WHERE email = '{$_POST['email']}'";
        $result_user = db::execute($sql_user);  
        $user = $result_user->fetch_assoc();
        if ($user && $user['password'] == $_POST['password']){
            $this->view['redirect'] = '/mentorconnect/signup.php';
            $_SESSION['user_id'] = $user['user_id'];
        } else {
            $this->view['response'] = 'you suck';
            
        }

        
        // // In the case of the Ajax Controller, the view is an array
        // // which can can be accessed as follows. This array will be
        // // converted to JSON when this script ends and sent to the client
        // // automatically
    
    }

}
$controller = new Controller();




