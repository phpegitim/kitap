<?php

namespace App\Model;

class User extends \Core\Model {

	private static $tableUserColNames = ['id', 'first_name', 'last_name', 'user_name', 'password', 'create_time'];

	public function getUserByUserName(string $userName) {

		$sql = 'SELECT * FROM users WHERE user_name=?';

		$stmt = $this -> dba -> prepare($sql);
		$stmt -> setFetchMode(\PDO::FETCH_ASSOC);

		if (!$stmt -> execute([$userName]))
			throw new \Exception('stmtErr:' . __METHOD__);

		$user = $stmt -> fetch();

		if (!$user)
			throw new \Exception('notFound:' . __METHOD__);

		return $user;

	}

	public function getUserById(int $userId) {

		$sql = 'SELECT * FROM users WHERE id=?';

		$stmt = $this -> dba -> prepare($sql);
		$stmt -> setFetchMode(\PDO::FETCH_ASSOC);

		if (!$stmt -> execute([$userId]))
			throw new \Exception('stmtErr:' . __METHOD__);

		$user = $stmt -> fetch();

		if (!$user)
			throw new \Exception('notFound:' . __METHOD__);

		return $user;

	}

	public function updateUser(int $userId, array $userKeyValueArr) {

		if ($userId < 1)
			throw new \InvalidArgumentException(__METHOD__ . ':UserId gerekli');

		if (empty($userKeyValueArr))
			throw new \InvalidArgumentException(__METHOD__ . ':Uservalues gerekli');

		$cols = array_keys($userKeyValueArr);
		$values = array_values($userKeyValueArr);

		foreach ($cols as $value)
			if (!in_array($value, self::$tableUserColNames))
				throw new \InvalidArgumentException(__METHOD__ . ':stmErr');

		$colSqlArr = [];
		foreach ($cols AS $value)
			$colSqlArr[] = $value . '=?';

		$sql = '
			UPDATE users 
			SET
				' . implode(', ', $colSqlArr) . '
			WHERE 
				id=?
		';

		$values[] = $userId;

		$stmt = $this -> dba -> prepare($sql);

		if (!$stmt -> execute($values))
			throw new \Exception('stmtErr:' . __METHOD__);

		return true;

	}

}
