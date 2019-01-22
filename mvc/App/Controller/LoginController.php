<?php
namespace App\Controller;
use App\{Model\User AS UserModel,Helper\AuthHelper};
use Core\View;

class LoginController extends \Core\Controller {

	const defaultMethod = 'login';

	public function login() {
		View::render('login.php');
	}

	public function loginAction() {

		header('Content-Type: application/json');
		$response = ['status' => false];

		try {

			if (empty($_POST) || !isset($_POST['user_name']) || !isset($_POST['password']))
				throw new \BadMethodCallException(__METHOD__ . ': eksik parametre');

			$modelUser = new UserModel;
			$user = $modelUser -> getUserByUserName($_POST['user_name']);

			if (!$user)
				throw new \Exception(__METHOD__ . ':notFound');

			if (password_verify($_POST['password'], $user['password']) === false)
				throw new \Exception(__METHOD__ . ':notMatch');
			
			AuthHelper::getInstance()->authenticate($user['id']);

			$response['result'] = $user['id'];
			$response['status'] = true;

		} catch(\Exception $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);

	}

	public function logout() {
		AuthHelper::getInstance()->endSession();
		header('Location: login');
	}

}
