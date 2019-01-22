<?php
namespace App\Model;

class Todo extends \Core\Model {

	public function getTodosByUserId(int $userId) {

		$sql = 'SELECT * FROM todos WHERE user_id=? ORDER BY id DESC';
		$stmt = $this -> dba -> prepare($sql);

		if (!$stmt -> execute([$userId]))
			throw new \PDOException('stmtErr:' . __METHOD__);

		return $stmt -> fetchAll(\PDO::FETCH_ASSOC);

	}

	public function getTodoById(int $id) {

		$sql = 'SELECT * FROM todos WHERE id=?';
		$stmt = $this -> dba -> prepare($sql);

		if (!$stmt -> execute([$id]))
			throw new \PDOException('stmtErr:' . __METHOD__);

		return $stmt -> fetch(\PDO::FETCH_ASSOC);

	}

	public function updateTodo(Entity\Todo $todo) {

		$sql = '
			UPDATE todos
			SET
				task = ?,
				completed = ?
			WHERE
				id = ?
		';

		$valueArr = [$todo -> getTask(), $todo -> getCompleted(), $todo -> getId()];
		$stmt = $this -> dba -> prepare($sql) -> execute($valueArr);

		if (!$stmt)
			throw new \Exception('stmtErr:' . __METHOD__);

		return true;

	}

	public function addTodo(Entity\Todo $todo) {

		$sql = '
			INSERT INTO todos
			SET
				user_id = ?,
				task = ?,
				completed = ?
		';
		
		$valueArr = [$todo -> getUserId(), $todo -> getTask(), $todo -> getCompleted()];
		$stmt = $this -> dba -> prepare($sql) -> execute($valueArr);

		if (!$stmt)
			throw new \PDOException('stmtErr:' . __METHOD__);

		return true;

	}

	public function removeTodoById(int $todoId) {

		$sql = '
			DELETE FROM todos
			WHERE
				id = ?
		';

		$stmt = $this -> dba -> prepare($sql) -> execute([$todoId]);

		if (!$stmt)
			throw new \PDOException('stmtErr:' . __METHOD__);

		return true;
	}

}
