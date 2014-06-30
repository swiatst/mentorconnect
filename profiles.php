<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();

		$user = new User($_GET['user_id']);
        $name = $user->first_name . ' '. $user->last_name; 
        $this->view->name= $name;
	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorconnect/css/profiles.css">
    <title><?php echo $name;?></title>
</head>
<body>
    <div class="container">
       <main> 
            <?php echo $name;?>
            <section>
               <aside>
               </aside> 
            </section>
       </main>
    </div>


</body>
</html>
                   


    