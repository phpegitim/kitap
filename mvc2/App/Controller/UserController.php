<?php
namespace App\Controller;
use App\{Model\User AS UserModel,Model\Entity\User,Helper\Authhelper};
use Core\View;


class UserController extends \Core\Controller {

	const defaultMethod = 'profile';
	
    public function initialize() {
		AuthHelper::authAreaControl();	
    }	

	public function profile() {
		
		$user = new User(AuthHelper::get('user'));
		$modelUser = new UserModel;
		$user = $modelUser->getUser($user);
		View::render('user-profile.php',['user'=>$user]);
	}
	
	public function profileAction() {
		
		header('Content-Type: application/json');
		$response = ['status' => false];
		try {
			
			if(empty($_POST))
				throw new \InvalidArgumentException(__METHOD__.':eksik argüman');
				

			$user = new User(AuthHelper::get('user'),$_POST['first_name'],$_POST['last_name'],null,$_POST['password']);
			

			$modelUser = new UserModel;
			$modelUser -> updateUser($user);
			

			$response['status'] = true;

		} catch(\Exception | \Error $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);
	}		



	
}
