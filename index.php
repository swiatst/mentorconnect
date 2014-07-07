<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();

        // $skill = new Skill(2);
        // $skill_name = $skill->name;
        // $this->view->skill_name = $skill_name; 

        // // SQL
        // $sql = "
        //     SELECT *
        //     FROM user
        //     ";

        // // Execute
        // $results = db::execute($sql);

        // $users = '';
        // while ($row = $results->fetch_assoc()) {
        //     $users .= '<a href="profiles.php?user_id=' . $row['user_id'] . '">' . $row['first_name'] . " ". $row['last_name'].' </a>';
        // }

        // $this->view->x = $users; 

        // server side validation

       
    

	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>


<div class="index">
    <div class="landing">
    Join the world's best social network for mentoring.
    </div>
    <aside class="index">
            <nav>
                <div class="dropdown">
                    <div class="connect">
                        Be mentored or become a mentor in any topic through <i>mentorconnect.com</i>.
                    </div>
                    <div style="font-size: 44px;" class="envelope">
                    <i class="fa fa-envelope"></i><span>        Connect with mentors and mentees from all over</span>
                    </div>

                    <div style="font-size: 44px;" class="book">
                    <i class="fa fa-graduation-cap"></i> <span>    Lose the internship and learn from real experts</span>
                    </div>

                    <div style="font-size: 44px;" class="university">
                    <i class="fa fa-university"></i> <span>    Any area of interest can be taught or learned</span>
                    </div>

                    
                    <!-- echo here -->
                
               
            </nav>
    </aside>

    <div class="divider">
        <div class="actioncall">Sign up today!
        </div> 
        <div class="actioncall2">It takes less time to sign up than to read this.
        </div>
        <form action="reg.php" method="POST" class="signup">
            <input type="text" class="signup-box" placeholder="First Name" name="first_name" id="first" required>
            <input type="text" class="signup-box" placeholder="Last Name" name="last_name" id="last" required><br>
            <input type="email" class="signup-box" placeholder="Email Address" name="email" id="email" required maxlength="100"><br>
            <input type="password" class="signup-box" placeholder="Password" name="password" id="password" required><br>
            <input type="password" class="signup-box" placeholder="Verify Password" name="verifypassword" id="verify" required><br><br>
            <button type="submit" id="join">Join now</button>
            <!-- <button class="cancel">Cancel</button> -->
            <p>  
        </form>

    </div>
</div>    