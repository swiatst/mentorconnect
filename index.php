<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();

        $skill = new Skill(2);
        $skill_name = $skill->name;
        $this->view->skill_name = $skill_name; 

        // SQL
        $sql = "
            SELECT *
            FROM user
            ";

        // Execute
        $results = db::execute($sql);

        $users = '';
        while ($row = $results->fetch_assoc()) {
            $users .= '<a href="profiles.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . " ". $row['last_name'].' </a>';
        }

        $this->view->x = $users; 

	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>



<aside>
            <nav>
                <div class="dropdown">
                    <?php echo $skill_name; ?>
                   <?php echo $x;?>  
                </div>
               
            </nav>
        </aside>

    <div class="section">
        <form action="signup.php" method="POST" class="signup">
            <input type="text" class="signup-box" placeholder="First Name" name="first_name" id="register"><br>
            <input type="text" class="signup-box" placeholder="Last Name" name="last_name" id="register"><br>
            <input type="email" class="signup-box" placeholder="Email Address" name="email" id="register"><br>
            <input type="password" class="signup-box" placeholder="Password" name="password" id="register"><br>
            <input type="password" class="signup-box" placeholder="Verify Password" name="verifypassword" id="register"><br><br>
            <button type="submit" id="register">Submit</button>
            <button class="cancel">Cancel</button>
            <p>  
        </form>

    </div>