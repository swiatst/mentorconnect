<?php

/**
 * App Controller
 */

require($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

class TestController extends AppController {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $sql_matches = [
            'user_id' => 6,
            'skill_id' => 7,
            'skill_role_id' => 8,

            
        ];
        $results = UserSkill::insert($sql_matches);
        if($results->user_id == 6) {
            die("failed test");
        }

    
    }

   
}
$controller = new TestController();

