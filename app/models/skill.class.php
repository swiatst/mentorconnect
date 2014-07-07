<?php

class Skill extends Model {
    
    public static function getSkills() {

        $sql = 'SELECT * FROM skill';
        $results = db::execute($sql);
        return $results;

    }

    public static function getRoles() {

        $sql_role = 'SELECT * FROM skill_role';
        $results_role = db::execute($sql_role);
        return $results_role;

    }

    public static function createMatch($input) {

        // Note that Server Side validation is not being done here
        // and should be implemented by you

        //print_r($input);

        // Prepare SQL Values
        $sql_values = [
            'skill_id' => $input['skill_id'],
            'name' => $input['name'],
            // 'last_name' => $input['last_name'],
            // 'email' => $input['email'],
            // 'password' => $input['password']
        ];

        // Ensure values are encompased with quote marks
        $sql_values = db::array_in_quotes($sql_values);

        // Insert
        $results_match = db::insert('skill_id', $sql_values);
        
        // Get Recent Insert ID
        $skill_id = $results_match->insert_id;

        // Return a new instance of this user as an object
        return new Skill($skill_id);

    }
}

