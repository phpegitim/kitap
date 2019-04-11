<?php
namespace App\Controller;
use App\{Model\Todo,Helper\AuthHelper};
use Core\View;

class TodoController extends \Core\Controller {

	const defaultMethod = 'listing';
	
    public function initialize() {
		AuthHelper::getInstance()->authAreaControl();	
    }	

	public function listing() {
		
		$modelTodo = new Todo();
		$todos = $modelTodo->getTodosByUserId(AuthHelper::getInstance()->get('user'));
		
		View::render('todo-listing.php',['todos'=>$todos]);
	}

	public function add() {
		View::render('todo-add.php');
	}
	

	
	public function edit() {
		
		if(!isset($this->params[0]))
			header('Location: ../todo/listing');
		
		$modelTodo = new Todo();
		$todo = $modelTodo->getTodoById((int)$this->params[0]);
		if($todo==false)
			header('Location: ../todo/listing');
		
		View::render('todo-edit.php',['todo'=>$todo]);
	}


	public function addAction() {
		
		header('Content-Type: application/json');
		$response = ['status' => false];
		try {

			if (empty($_POST) || !isset($_POST['task']))
				throw new \BadMethodCallException(__METHOD__ . ': eksik parametre');
			
			$_POST['user_id'] = AuthHelper::getInstance()->get('user');
				
			$modelTodo = new Todo;
			$modelTodo -> addTodo($_POST);

			$response['status'] = true;

		} catch(\Exception | \Error $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);
	}		
	

	
	public function editAction() {
		
		header('Content-Type: application/json');
		$response = ['status' => false];
		try {
	
			if (empty($_POST) || !isset($_POST['id']))
				throw new \BadMethodCallException(__METHOD__ . ': eksik parametre');
			
			$modelTodo = new Todo;
			
			$isUserTodo = $modelTodo->getTodoById($_POST['id']);			
			if($isUserTodo==false || $isUserTodo['user_id']!=AuthHelper::getInstance()->get('user'))
				throw new \Exception(__METHOD__ . ': yetki sorunu');
			
			
			$modelTodo -> updateTodo($isUserTodo['id'],$_POST);
	
			$response['status'] = true;
	
		} catch(\Exception | \Error $e) {
	
			$response['error'] = $e -> getMessage();
	
		}
	
		echo json_encode($response);
	}
	
	public function removeAction() {
		
		header('Content-Type: application/json');
		$response = ['status' => false];
		try {

			if(!isset($this->params[0]))
				throw new \BadMethodCallException(__METHOD__ . ': eksik parametre');
			
			$todoId = (int)$this->params[0];
			
			$modelTodo = new Todo;
			
			$isUserTodo = $modelTodo->getTodoById($todoId);			
			if($isUserTodo==false || $isUserTodo['user_id']!=AuthHelper::getInstance()->get('user'))
				throw new \Exception(__METHOD__ . ': yetki sorunu');
			
			
			$modelTodo -> removeTodoById($todoId);

			$response['status'] = true;

		} catch(\Exception | \Error $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);
	}					
	
}
