<?php
namespace App\Model;

class Todo extends \Core\Model {
	
	private static $tableTodosColNames = ['id', 'user_id', 'task', 'completed',  'create_time'];

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

	public function updateTodo(int $todoId, array $todoKeyValueArr) {

		if ($todoId < 1)
			throw new \InvalidArgumentException(__METHOD__ . ':todoId gerekli');

		if (empty($todoKeyValueArr))
			throw new \InvalidArgumentException(__METHOD__ . ':todoKeyValueArr gerekli');

		$cols = array_keys($todoKeyValueArr);
		$values = array_values($todoKeyValueArr);

		foreach ($cols as $value)
			if (!in_array($value, self::$tableTodosColNames))
				throw new \InvalidArgumentException(__METHOD__ . ':stmErr');

		$colSqlArr = [];
		foreach ($cols AS $value)
			$colSqlArr[] = $value . '=?';

		$sql = '
			UPDATE todos
			SET
				' . implode(', ', $colSqlArr) . '
			WHERE
				id = ?
		';


		$values[] = $todoId;

		$stmt = $this -> dba -> prepare($sql);

		if (!$stmt -> execute($values))
			throw new \Exception('stmtErr:' . __METHOD__);

		return true;

	}

	public function addTodo(array $todoKeyValueArr) {
		
		if (empty($todoKeyValueArr))
			throw new \InvalidArgumentException(__METHOD__ . ':todoKeyValueArr gerekli');

		$cols = array_keys($todoKeyValueArr);
		$values = array_values($todoKeyValueArr);	
		
		foreach ($cols as $value)
			if (!in_array($value, self::$tableTodosColNames))
				throw new \InvalidArgumentException(__METHOD__ . ':stmErr');
		
		$colSqlArr = [];
		foreach ($cols AS $value)
			$colSqlArr[] = $value . '=?';
		


		$sql = '
			INSERT INTO todos
			SET
				' . implode(', ', $colSqlArr) . '
		';

		$stmt = $this -> dba -> prepare($sql) -> execute($values);

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
