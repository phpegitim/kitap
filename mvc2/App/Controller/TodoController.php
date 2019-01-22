<?php
namespace App\Controller;
use App\{Model\Todo,Helper\Authhelper};
use Core\View;

class TodoController extends \Core\Controller {

	const defaultMethod = 'listing';
	
    public function initialize() {
		AuthHelper::authAreaControl();	
    }	

	public function listing() {
		
		$modelTodo = new Todo();
		$todos = $modelTodo->getTodosByUserId(AuthHelper::get('user'));
		
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
			
			$todo = new \App\Model\Entity\Todo(null,AuthHelper::get('user'),$_POST['task'],$_POST['completed']);

			$modelTodo = new Todo;
			$modelTodo -> addTodo($todo);

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
		if($isUserTodo==false || $isUserTodo['user_id']!=AuthHelper::get('user'))
			throw new \Exception(__METHOD__ . ': yetki sorunu');
		
		$todo = new \App\Model\Entity\Todo($_POST['id'],AuthHelper::get('user'),$_POST['task'],$_POST['completed']);
		$modelTodo -> updateTodo($todo);

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
			if($isUserTodo==false || $isUserTodo['user_id']!=AuthHelper::get('user'))
				throw new \Exception(__METHOD__ . ': yetki sorunu');
			
			
			$modelTodo -> removeTodoById($todoId);

			$response['status'] = true;

		} catch(\Exception | \Error $e) {

			$response['error'] = $e -> getMessage();

		}

		echo json_encode($response);
	}					
	
}
