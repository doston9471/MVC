<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>
			<?php echo htmlentities($title); ?>
		</title>
	</head>
	<body>
		<h3>Add New Student</h3>
		<?php
			if ($errors) {
				echo '<ul class="errors">';
				foreach ($errors as $field => $error) {
					echo '<li>' . htmlentities($error) . '</li>';
				}
				echo '</ul>';
			}
		?>

		<form method="post" action="">
				<label for="student_name">Name: </label><br>
					<input type="text" name="student_name" value="<?php echo htmlentities($student->student_name); ?>">
				<br>
				<label for="age">Age: </label><br>
					<input type="text" name="age" value="<?php echo htmlentities($student->age); ?>">
				<br>
				<label for="Email">Email: </label><br>
					<input type="text" name="email" value="<?php echo htmlentities($student->email); ?>">
				<br>
				<label for="Password">Password: </label><br>
					<textarea name="password"><?php echo htmlentities($student->password); ?></textarea>
				<br>
				<label for="gender">Gender: </label><br>
					<textarea name="gender"><?php echo htmlentities($student->gender); ?></textarea>
				<br>
				<label for="fid">Faculty-id: </label><br>
					<textarea name="fid"><?php echo htmlentities($student->fid); ?></textarea>
				<br>

			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Edit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>
