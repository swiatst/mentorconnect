<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/mentorconnect/app/core/initialize.php');

// Controller
class Controller extends AjaxController {
	public function __construct() {
		parent::__construct();

		// Save User
		//$user = User::insert($_POST);
		// $select = "
		// 			SELECT *
		// 			FROM user_skill
		// 			WHERE user_id != {$_SESSION['user_id']}
		// 			AND skill_role_id = {$_POST['choose_role']}
		// 			AND skill_id = {$_POST['choose_otherrole']}";

	
		// $results = db::execute($select);
		// if (! $row = $results->fetch_assoc()){

			$inputs = [
				'user_id' => $_SESSION['user_id'],
				'skill_role_id' => $_POST['choose_role'], 
				'skill_id' => $_POST['choose_otherrole'],
			];

			$skill = UserSkill::insert($inputs);
		//}
		// In the case of the Ajax Controller, the view is an array
		// which can can be accessed as follows. This array will be
		// converted to JSON when this script ends and sent to the client
		// automatically
		//$this->view['response'] = 'Skill ' . $user->first_name . ' was successfully created';

		$this->view['redirect'] = 'profiles.php';

	}

}
$controller = new Controller();