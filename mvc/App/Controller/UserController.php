<?php
namespace App\Controller;
use App\{Model\User AS UserModel,Helper\AuthHelper};
use Core\View;

class UserController extends \Core\Controller {

	const defaultMethod = 'profile';
	
    public function initialize() {
		AuthHelper::getInstance()->authAreaControl();	
    }	

	public function profile() {
		$modelUser = new UserModel;
		$user = $modelUser->getUserById(AuthHelper::getInstance()->get('user'));
		View::render('user-profile.php',['user'=>$user]);
	}
	
	public function profileAction() {
		
		header('Content-Type: application/json');
		$response = ['status' => false];
		
		try {
			
			if(empty($_POST))
				throw new \InvalidArgumentException(__METHOD__.':eksik argüman');

			if($_POST['password']=='')
				unset($_POST['password']);
			
			if(isset($_POST['password']))	
				$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
			
			$modelUser = new UserModel;
			$modelUser -> updateUser(AuthHelper::getInstance()->get('user'),$_POST);

			$response['status'] = true;

		} catch(\Exception | \Error $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);
	}		
	
}
