<?php
namespace App\Controller;
use App\Model\{User AS UserModel, Entity\User};
use Core\View;
use App\Helper\AuthHelper;

class LoginController extends \Core\Controller {

	const defaultMethod = 'login';

	public function login() {
		//echo password_hash('3213211',PASSWORD_DEFAULT);
		
		View::render('login.php');
	}

	public function loginAction() {
		
		
		header('Content-Type: application/json');
		$response = ['status' => false];

		try {
			
			
			
			if (empty($_POST) || !isset($_POST['user_name']) || !isset($_POST['password']))
				throw new \BadMethodCallException(__METHOD__ . ': eksik parametre');

			$checkUser = new User;
			$checkUser -> setUserName($_POST['user_name']);

			$modelUser = new UserModel;
			$user = $modelUser -> getUser($checkUser,'user_name');
			

			if (!$user || !password_verify($_POST['password'], $user -> getPassword()))
				throw new \Exception(__METHOD__ . ':notMatch');
			
			AuthHelper::authenticate($user);
			
			$response['result'] = $user -> getId();
			$response['status'] = true;

		} catch(\Exception $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);

	}
	
	public function logout() {
		AuthHelper::endSession();
		header('Location: login');
	}	
	

}
