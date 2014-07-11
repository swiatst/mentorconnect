<?php


// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');



// if ($_SESSION['user_id']){
//   header("Location: signup.php");
//   exit();
// }



// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();
        if($_GET['user_id']) {
            $user_id = $_GET['user_id'];
        } else {
            $user_id = $_SESSION['user_id'];
        }
		$user = new User($user_id);
        $name = $user->first_name . ' '. $user->last_name; 
        $this->view->name= $name;





        // Get where I am a apprentice, so we can find my matched mentors
        $sql_profiles = "
            SELECT *
            FROM user_skill
            WHERE user_id = '{$_SESSION['user_id']}'
            AND skill_role_id = 2
            ";

        
        $results = db::execute($sql_profiles);

        while($row = $results->fetch_assoc()){
          
            $skill_id = $row['skill_id'];

            $sql_mentors = "
                SELECT *
                FROM user_skill
                JOIN user USING (user_id)
                JOIN skill USING (skill_id)
                WHERE skill_id = '{$skill_id}'
                AND user_id != '{$_SESSION['user_id']}'
                AND skill_role_id = 1
                ";

            $mentor_results = db::execute($sql_mentors);

            while ($mentor = $mentor_results->fetch_assoc()) {
                $mentors_html .= "<li>
                            <div class='outer'>
                              <a href='profiles.php'><img src='images/{$mentor['image']}'></a>
                              <div class='content'>
                                <h4><a href='profiles.php?user_id={$mentor['user_id']}'>{$mentor['first_name']} {$mentor['last_name']}</a></h4>
                                <p>Mentor</p>
                                <p>{$mentor['name']}</p>
                                <p><a href='mailto:{$mentor['email']}'>{$mentor['email']}</a></p>
                              </div>
                            </div>
                          </li>";# code...

            }



        }   





        // // Get where I am a mentor, so we can find my matched mentees
        $sql_profiles = "
            SELECT *
            FROM user_skill
            WHERE user_id = '{$_SESSION['user_id']}'
            AND skill_role_id = 1
            ";

        $results = db::execute($sql_profiles);

        while($row = $results->fetch_assoc()){
          
            $skill_id = $row['skill_id'];

            $sql_mentees = "
                SELECT *
                FROM user_skill
                JOIN user USING (user_id)
                JOIN skill USING (skill_id)
                WHERE skill_id = '{$skill_id}'
                AND user_id != '{$_SESSION['user_id']}'
                AND skill_role_id = 2
                ";

            $mentees_results = db::execute($sql_mentees);

            while ($mentee = $mentees_results->fetch_assoc()) {
                $mentees_html .= "<li>
                            <div class='outer'>
                              <a href='profiles.php'><img src='images/{$mentee['image']}'></a>
                              <div class='content'>
                                <h4><a href='profiles.php?user_id={$mentee['user_id']}'>{$mentee['first_name']} {$mentee['last_name']}</a></h4>
                                <p>Protege</p>
                                <p>{$mentee['name']}</p>
                                <p><a href='mailto:{$mentee['email']}'>{$mentee['email']}</a></p>
                              </div>
                            </div>
                          </li>";# code...

            }



        } 




       
        $this->view->mentors_html = $mentors_html;
        $this->view->mentees_html = $mentees_html;
        $this->view->user = $user;
	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="container1">
       
    
    <section class="profile">
       <aside class="profile">
        <div class="info">
        <!-- <div class="letter"></div> -->
            <img src="images/<?php echo $user->image; ?>">
            
                <h2 class="h2name"><?php echo $user->first_name . " " . $user->last_name; ?></h2><p></p>
                <h3><?php echo $user->talent; ?></h3>
                <!-- <h3 class="bottom">Mentor in Writing</h3><p></p> -->
                <h4 class="h4text"><span class="highlight">Location:</span> <?php echo $user->location; ?> | <span class="highlight">Born:</span> <?php echo $user->born; ?></h4><p></p>
                <h4 class="h4text"><span class="highlight">Current position:</span> <?php echo $user->current; ?></h4><p></p>
                <h4 class="h4text"><span class="highlight">Former position:</span> <?php echo $user->former; ?></h4><p></p>
                <h4 class="h4text"><span class="highlight">Education:</span> <?php echo $user->education; ?></h4><p></p>
                
                <a class="mailto" href="mailto:<?php echo $user->email; ?>">Connect Now!</a>  
                <a class="search" href="signup.php">Search More!</a>  
                   
            </div>

       </aside> 
        <div class="column">
            <div class="headerbox"> 
                <h1 class="h1text">Your Matches</h1>
                <div class="h2box">
               
                    <h2 class="mentors"><i>Mentors</i></h2> 
                    <h2 class="mentees"><i>Proteges</i></h2>
                </div>
            </div>
            <div class="ulmatches">
                <ul class="listing">
                    <?php echo $mentors_html; ?>
                </ul>
                
                <ul class="listing">
                    <?php echo $mentees_html; ?>
                </ul>
            </div>              
                   
               
        </div>

    </section>

</div>



                   


    