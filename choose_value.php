<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
	public function __construct() {
		parent::__construct();

		// Save User
		//$user = User::insert($_POST);

		$skill = Skill::insert($_POST);

		// In the case of the Ajax Controller, the view is an array
		// which can can be accessed as follows. This array will be
		// converted to JSON when this script ends and sent to the client
		// automatically
		//$this->view['response'] = 'Skill ' . $user->first_name . ' was successfully created';

		$this->view['redirect'] = 'profile.php?skill_id=5&foo=' . $_POST['choose_role'];

	}

}
$controller = new Controller();