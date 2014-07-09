<?php

/**
 * User
 */
class UserSkill extends Model {

    /**
     * Insert User. Note that while normally the User class is used in object
     * context, when creating new users we must use the class in static context
     * since won't have the opportunity to create the new User without having
     * a user_id to pass in. 
     *
     * Example:
     * User::insert($values);
     */
    public function __construct() {

            $x = 1;

    }
    public static function insert($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you


        // Prepare SQL Values
        $sql_matches = [
            'user_id' => $input['user_id'],
            'skill_id' => $input['skill_id'],
            'skill_role_id' => $input['skill_role_id'],  
        ];

        // Ensure values are encompased with quote marks
        $sql_matches = db::array_in_quotes($sql_matches);

        // Insert
        $results = db::insert('user_skill', $sql_matches);
        
        // Get Recent Insert ID
        // $user_id = $results->insert_id;

        // Return a new instance of this user as an object
        $user_skill= new UserSkill();
        $user_skill->user_id = $input['user_id'];
        $user_skill->skill_id = $input['skill_id'];
        $user_skill->skill_role_id = $input['skill_role_id'];

        
        return $user_skill;


    }

}    