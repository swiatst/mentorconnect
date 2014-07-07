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
        $user_id = $_SESSION['user_id'];
		$user = new User($user_id);
        $name = $user->first_name . ' '. $user->last_name; 
        $this->view->name= $name;

        $sql_profiles = "select * from user as u, skill as s, skill_role as sr, user_skill as us 
        where u.user_id = us.user_id and
        s.skill_id = us.skill_id and 
        sr.skill_role_id = us.skill_role_id and
        sr.skill_role_id = 1";


        $results = db::execute($sql_profiles);

        // $company_info = $results->fetch_assoc();
        // $match = $results->fetch_assoc();
        // // $averages = getAverages($company_id);
        // print_r($match);


        // pretend we're going to print out all users
        // Payload::$values = [];

        // while($row = $results->fetch_assoc()){
          
        //     $a = [];
        //     $a['Name'] = $row['Name'];
        //     $a['Skill'] = $row['Industry'];
        //     $a['Website'] = $row['Website'];
        //     $a['Logo'] = $row['Logo'];
        //     $a['Id'] = $row['company_id'];
        //     $a['Average'] = $avg['Average'];
        //     // print_r($a);
        //     array_push(Payload::$values, $a);
        //  }   
        $mentors_html = '';
        $skillsDesired = getDesiredSkills(5);
        foreach ($skillsDesired as $skillDesired) {
            $mentors = getMentorsForSkill($skillDesired);
            // print_r($mentors);
            foreach ($mentors as $mentor) {
                # code...


            $mentors_html .= "<li>
              <div class='outer'>
                <a href='profiles.php'><img src='images/{$mentor['image']}'></a>
                <div class='content'>
                  <h4>{$mentor['first_name']} {$mentor['last_name']}</h4>
                  <p>{$mentor['role']}</p>
                  <p>{$mentor['name']}</p>
                  <p>{$mentor['email']}</p>
                </div>
              </div>
            </li>";# code...
            }        
        }

        $mentees_html = '';
        $skillsOffered = getOfferedSkills(5);
        // echo "Give me something!"; print_r($skillsOffered);
        foreach ($skillsOffered as $skillOffered) {
            $mentees = getMenteesForSkill($skillOffered);
            // print_r($mentees);
            foreach ($mentees as $mentee) {
                # code...

                //http://project_name.com/mentorconnect/images/stefan_nyc.jpg

            $mentees_html .= "<li>
              <div class='outer'>
                <a href='profiles.php'><img src='images/{$mentee['image']}'></a>
                <div class='content'>
                  <h4>{$mentee['first_name']} {$mentee['last_name']}</h4>
                  <p>{$mentee['role']}</p>
                  <p>{$mentee['name']}</p>
                  <p>{$mentee['email']}</p>
                </div>
              </div>
            </li>";# code...
            }        
        }
        



        
        // while ($row = $results->fetch_assoc()) {
        //     // "<li>{$row['first_name']} {$row['last_name']} {$row['role']} {$row['skill']}</li>";
        //     //     print_r($row);
            
        // }
       
        $this->view->mentors_html = $mentors_html;
        $this->view->mentees_html = $mentees_html;
	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

$sql_users = "select * from user as u, skill as s, skill_role as sr, user_skill as us 
where u.user_id = us.user_id and
s.skill_id = us.skill_id and 
sr.skill_role_id = us.skill_role_id and
sr.skill_role_id = 1";


function getDesiredSkills($user_id) {
    $select = "select * from user_skill 
                WHERE skill_role_id = 2 and
                user_id = $user_id";

    $results = db::execute($select);
    $skill_ids = []; 
    while ($row = $results->fetch_assoc()) {
        array_push($skill_ids, $row['skill_id']);
    }

    return $skill_ids;

}

function getOfferedSkills($user_id) {
    $select = "select * from user_skill 
                WHERE skill_role_id = 1 and
                user_id = $user_id";

    $results = db::execute($select);
    $skill_ids = []; 
    while ($row = $results->fetch_assoc()) {
        array_push($skill_ids, $row['skill_id']);
    }

    return $skill_ids;

}

function getMentorsForSkill($skill_id) {
    $select = "select * from user as u, skill as s, skill_role as sr, user_skill as us 
    where u.user_id = us.user_id and
    s.skill_id = us.skill_id and 
    sr.skill_role_id = us.skill_role_id and
    sr.skill_role_id = 1 and us.skill_id = $skill_id";


    $results = db::execute($select);
    $mentors = []; 
    while ($row = $results->fetch_assoc()) {
        array_push($mentors, $row);
    }

    return $mentors;

}

function getMenteesForSkill($skill_id) {
    $select = "select * from user as u, skill as s, skill_role as sr, user_skill as us 
    where u.user_id = us.user_id and
    s.skill_id = us.skill_id and 
    sr.skill_role_id = us.skill_role_id and
    sr.skill_role_id = 2 and us.skill_id = $skill_id";


    $results = db::execute($select);
    $mentees = []; 
    while ($row = $results->fetch_assoc()) {
        array_push($mentees, $row);
    }

    return $mentees;

}


?>

<div class="container1">
       
            <?php echo $name;?>

            

    <section class="profile">
       <aside class="profile">
        <div class="info">
            <img src="/mentorconnect/images/stefan_nyc.jpg">
            
                <h2 class="h2name">Stefan Swiat</h2><p></p>
                <h3>Digital Producer</h3>
                <h3 class="bottom">Mentor in Writing</h3><p></p>
                <h4><FONT COLOR="blue">Location:</font> Phoenix, AZ | <FONT COLOR="#0000FF">Born:</font> Goshen, NY</h4><p></p>
                <h4><FONT COLOR="#0000FF">Current position:</font> Web Developer at RockIT BootCamp, Phoenix, AZ</h4><p></p>
                <h4><FONT COLOR="#0000FF">Former position:</font> Phoenix Suns Digital Producer, Phoenix, AZ</h4><p></p>
                <h4><FONT COLOR="#0000FF">Education:</font> BA from Concordia College, Moorhead, MN</h4><p></p>
                
                <button class="contact">Connect Now!</button>  
                    <?php echo $name;?>
            </div>

       </aside> 
        <div class="column">
            <div class="headerbox"> 
                <h1 class="h1text">Your Matches</h1>
                <div class="h2box">
               
                    <h2 class="mentors"><i>Mentors</i></h2> 
                    <h2 class="mentees"><i>Mentees</i></h2>
            </div>
                </div>
            <div class="ulmatches"></div>
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



                   


    