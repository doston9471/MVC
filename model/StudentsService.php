<?php

require_once 'StudentsGateway.php';
require_once 'ValidationException.php';
require_once 'Database.php';

class StudentsService extends StudentsGateway
{

	private $studentsGateway = null;

	public function __construct()
	{
		$this->studentsGateway = new StudentsGateway();
	}

	public function getAllStudents($order) {
	    try {
	        self::connect();
	        $res = $this->studentsGateway->selectAll($order);
	        self::disconnect();
	        return $res;
	    } catch (Exception $e) {
	        self::disconnect();
	        throw $e;
	    }
	}

	public function getStudent($id)
	{
		try {
			self::connect();
			$result = $this->studentsGateway->selectById($id);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
		return $this->studentsGateway->selectById($id);
	}

	private function validateStudentParams($student_name, $age, $email, $password, $gender, $fid)
	{
		$errors = array();
		if ( !isset($student_name) || empty($student_name) ) {
			    $errors[] = 'Name is required';
			}
			if ( !isset($age) || empty($age) ) {
			    $errors[] = 'Age is required';
			}
			if ( !isset($email) || empty($email) ) {
			    $errors[] = 'Email address is required';
			}
			if ( !isset($password) || empty($password) ) {
			    $errors[] = 'Password field is required';
			}
			if ( !isset($gender) || empty($gender) ) {
			    $errors[] = 'Gender is required';
			}
			if ( !isset($fid) || empty($fid) ) {
			    $errors[] = 'Faculty is required';
			}
		if (empty($errors)) {
			return;
		}
		throw new ValidationException($errors);
	}

	public function createNewStudent($student_name, $age, $email, $password, $gender, $fid)
	{
		try {
			self::connect();
			$this->validateStudentParams($student_name, $age, $email, $password, $gender, $fid);
			$result = $this->studentsGateway->insert($student_name, $age, $email, $password, $gender, $fid);
			self::disconnect();
			return $result;
		} catch(Exception $e) {
			self::disconnect();
			throw $e;

		}
	}

	public function editStudent($student_name, $age, $email, $password, $gender, $fid, $id)
	{
		try {
			self::connect();
			$result = $this->studentsGateway->edit($student_name, $age, $email, $password, $gender, $fid, $id);
			self::disconnect();
		}catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}

	public function deleteStudent($id)
	{
		try {
			self::connect();
			$result = $this->studentsGateway->delete($id);
			self::disconnect();
		} catch(Exception $e) {
			self::disconnect();
			throw $e;
		}
	}
}

?>
