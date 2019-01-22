<?php

namespace App\Model;

class User extends \Core\Model {

	public function getUser(Entity\User $user, $qField = 'id') {

		$queryArr = [];
		switch ($qField) {
			case 'id' :
				if ($user -> getId() == null)
					throw new \BadMethodCallException('methodCallErr:' . __METHOD__);
				$queryArr = ['id' => $user -> getId()];
				break;
			case 'user_name' :
				if ($user -> getUserName() == null)
					throw new \BadMethodCallException('methodCallErr:' . __METHOD__);
				$queryArr = ['user_name' => $user -> getUserName()];
				break;
		}

		$sql = 'SELECT * FROM users WHERE ' . key($queryArr) . '=?';

		$stmt = $this -> dba -> prepare($sql);
		$stmt -> setFetchMode( \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_class($user));

		if (!$stmt -> execute([$queryArr[key($queryArr)]]))
			throw new \Exception('stmtErr:' . __METHOD__);

		$user = $stmt -> fetch();
		
		
		if (!$user)
			throw new \Exception('notFound:' . __METHOD__);

		return $user;

	}

	public function updateUser(Entity\User $user) {
		
		if($user->getId()==null)
			throw new \InvalidArgumentException(__METHOD__.':UserId gerekli');
		
		$queryValueArr = [];
		$queryFieldArr = [];
		
		if ($user -> getPassword() !== null) {
			$queryFieldArr[] = 'password=?';
			$queryValueArr[] = $user -> getPassword();
		}

		if ($user -> getFirstName() !== null) {
			$queryFieldArr[] = 'first_name=?';
			$queryValueArr[] = $user -> getFirstName();
		}

		if ($user -> getLastName() !== null) {
			$queryFieldArr[] = 'last_name=?';
			$queryValueArr[] = $user -> getLastName();
		}

		$queryValueArr[] = $user->getId();

		$sql = '
			UPDATE users 
			SET
				'.implode(',', $queryFieldArr).'
			WHERE 
				id=?
		';
		

		$stmt = $this -> dba -> prepare($sql);

		if (!$stmt -> execute($queryValueArr))
			throw new \Exception('stmtErr:' . __METHOD__);

		return true;

	}

}
