<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $sql_choices = $_POST;
//     // print_r($sql_values);
//     $table = "user_skill"; 
//     $sql_choices = User::insert($_POST);
//     $results = db::execute($$sql_choices);
//     // $db->insert($table, $sql_choices);
//     $this->view['redirect'] = '/mentorconnect/profiles.php?'; add


// }

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        $user = new User($_GET['user_id']);
        $name = $user->first_name . ' '. $user->last_name; 
        $this->view->name= $name;

        $results = Skill::getSkills();
        $this->view->skills=$results;

        $results_role = Skill::getRoles();
        $this->view->roles=$results_role;




    }



}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="welcome"></div>
    <section class="welcome">
       <aside class="welcome">
            <div class="leftblocktext">Welcome to <i>mentorconnect.com!</i>
            </div>
            <div class="leftblocktext1">Where mentors and mentees connect
            </div>
            <span class="arrow">
            <i class="fa fa-arrows-h"></i> 
            </span>

       </aside> 
       <div class="dropdown-right">
            <div class="role">Choose whether you want to LEARN or TEACH</div><br>
            <form action="choose_value.php" method="POST" class="form">
                
                
                <select name="choose_role" title="I am a" class="choose_role" required>
                    <option value="">- Select Role -</option>
                    <?php while($row = $roles->fetch_assoc()){
                        echo "<option value=\"" . $row['skill_role_id'] . "\">" . $row['role'] . "</option>";};
                    ?> 
                </select>
                
                
                <select name="choose_otherrole" title="with an interest in" class="choose_otherrole">
                    <option value="">- Select Skill -</option>
                  <?php while($row = $skills->fetch_assoc()){
                      echo "<option value=\"" . $row['skill_id'] . "\">" . $row['name'] . "</option>";};
                  ?> 
                </select>
                <p></p>
                <p></p>
                <p></p>

                <button class="matches">See your matches!</button>
            </form>
        </div>
    </section>
   
</div>