<?php
require_once 'Database.php';

class StudentsGateway extends Database
{

	public function selectAll($order)
	{
		if (!isset($order)) {
			$order = 'student_name';
		}
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM Students ORDER BY $order ASC");
		$sql->execute();

		$students = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ)) {

			$students[] = $obj;
		}
		return $students;
	}

	public function selectById($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("SELECT * FROM Students WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);

		return $result;
	}

	public function insert($student_name, $age, $email, $password, $gender)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("INSERT INTO Students (student_name, age, email, password, gender, fid) VALUES (?, ?, ?, ?, ?, ?)");
		$result = $sql->execute(array($student_name, $age, $email, $password, $gender, $fid));
	}

	public function edit($student_name, $age, $email, $password, $gender, $fid, $id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("UPDATE Students set student_name = ?, age = ?, email = ?, password = ?, gender = ?, fid = ? WHERE id = ? LIMIT 1");
		$result = $sql->execute(array($student_name, $age, $email, $password, $gender, $fid, $id));
	}

	public function delete($id)
	{
		$pdo = Database::connect();
		$sql = $pdo->prepare("DELETE FROM Students WHERE id = ?");
		$sql->execute(array($id));
	}
}

?>
