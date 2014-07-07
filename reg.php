<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Save User
        $user = false;        
        
        // // In the case of the Ajax Controller, the view is an array
        // // which can can be accessed as follows. This array will be
        // // converted to JSON when this script ends and sent to the client
        // // automatically
    

        $emailreg = '/^[a-zA-Z-_.+]+@[a-zA-Z-_.+]+\.[a-z]{2,6}\.?[a-z]+/';
        // $passreg = '/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{2,64})/';
        $errorarray = [];
        $errorstring = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Check email against REGEX
            if (preg_match($emailreg, $_POST['email']) === 1){
                $sql_user = "SELECT * FROM user WHERE email = '{$_POST['email']}'";
                $result_user = db::execute($sql_user);
                // Check that email is unique
                if ($result_user->num_rows == 0){

                    //Check that passwords match
                    if ($_POST['password'] == $_POST['verifypassword']){
                        // print_r($_POST);
                        //Check password has 8chars and at least 1 number and one symbol
                        if (strlen($_POST['password']) >=4){


                            // (preg_match($passreg, $_POST['password']) === 1){
                            //Drop second password field
                            unset($_POST['verifypassword']);
                            $sql_values = $_POST;
                            $sql_values['password'] = password_hash($sql_values['password'], PASSWORD_DEFAULT); 
                            $user = User::insert($_POST);
                            $_SESSION['user_id'] = $user->user_id;


                        
                        }else{
                            $errorstring = "Your password must be at least 8 characters with at least one number and one symbol";
                            array_push($errorarray, $errorstring);
                        }
                   
                    }else{
                        $errorstring = "Your passwords do not match";
                        array_push($errorarray, $errorstring);
                    }
                
                }else{
                    $errorstring = "Your email is already associated with an account";
                    array_push($errorarray, $errorstring);
                }
            
            }else{
                $errorstring = "Please enter a valid email";
                array_push($errorarray, $errorstring);
            }

        }    
        if (count($errorarray)){
            $this->view['response'] = json_encode($errorarray);
            
        } else {
            $this->view['redirect'] = '/mentorconnect/signup.php';
            
        }
    }

}
$controller = new Controller();