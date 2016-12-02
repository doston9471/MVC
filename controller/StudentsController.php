<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/var/www/html/mvc/model/Autoloader.php';
require_once ROOT_PATH . '/model/StudentsService.php';


class StudentsController
{

	private $studentsService = null;

	public function __construct()
	{
		$this->studentsService = new StudentsService();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function handleRequest()
	{
		$op = isset($_GET['op']) ? $_GET['op'] : null;

		try {

			if (!$op || $op == 'list') {
				$this->listStudents();
			} elseif ($op == 'new') {
				$this->saveStudent();
			} elseif ($op == 'edit') {
				$this->editStudent();
			} elseif ($op == 'delete') {
				$this->deleteStudent();
			} elseif ($op == 'show') {
				$this->showStudent();
			} else {
				$this->showError("Page not found", "Page for operation " . $op . " was not found!");
			}
		} catch(Exception $e) {
			$this->showError("Application error", $e->getMessage());
		}
	}

	public function listStudents()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$students = $this->studentsService->getAllStudents($orderby);
		include ROOT_PATH . '/view/students.php';

	}

	public function saveStudent()
	{
		$title = 'Add new student';

		$student_name = '';
		$age 	 = '';
		$email 	 = '';
		$password = '';
		$gender = '';
		$fid = '';

		$errors = array();

		if (isset($_POST['form-submitted'])) {

			$student_name 	 = isset($_POST['student_name']) 	? trim($_POST['student_name']) 	  : null;
			$age	 = isset($_POST['age']) 	? trim($_POST['age'])   : null;
			$email 	 = isset($_POST['email']) 	? trim($_POST['email'])   : null;
			$password = isset($_POST['password']) ? trim($_POST['password']) : null;
			$gender	 = isset($_POST['gender']) 	? trim($_POST['gender'])   : null;
			$fid	 = isset($_POST['fid']) 	? trim($_POST['fid'])   : null;
			try {
				$this->studentsService->createNewStudent($student_name, $age, $email, $password, $gender, $fid);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . '/view/student-form.php';
	}

	public function editStudent()
	{
		$title  = "Edit Student";

		$student_name 	 = '';
		$age 	 = '';
		$email 	 = '';
		$password = '';
		$gender = '';
		$fid = '';
		$id      = $_GET['id'];

		$errors = array();

		$student = $this->studentsService->getStudent($id);

		if (isset($_POST['form-submitted'])) {

			$student_name 	 = isset($_POST['student_name']) 	? trim($_POST['student_name']) 	  : null;
			$age	 = isset($_POST['age']) 	? trim($_POST['age'])   : null;
			$email 	 = isset($_POST['email']) 	? trim($_POST['email'])   : null;
			$password = isset($_POST['password']) ? trim($_POST['password']) : null;
			$gender	 = isset($_POST['gender']) 	? trim($_POST['gender'])   : null;
			$fid	 = isset($_POST['fid']) 	? trim($_POST['fid'])   : null;

			try {
				$this->studentsService->editStudent($student_name, $age, $email, $password, $gender, $fid, $id);
				$this->redirect('index.php');
				return;
			} catch(ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . 'view/student-form-edit.php';
	}

	public function deleteStudent()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;
			if (!$id) {
				throw new Exception('Internal error');
			}
			$this->studentsService->deleteStudent($id);

			$this->redirect('index.php');
	}

	public function showStudent()
	{
		$id = isset($_GET['id']) ? $_GET['id'] : null;

		$errors = array();

		if (!$id) {
			throw new Exception('Internal error');
		}
		$student = $this->studentsService->getStudent($id);

		include ROOT_PATH . 'view/student.php';
	}

	public function showError($title, $message)
	{
		include ROOT_PATH . 'view/error.php';
	}
}

?>
