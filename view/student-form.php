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
					<input type="text" name="student_name" value="<?php echo htmlentities($student_name); ?>">
				<br>
				<label for="age">Age: </label><br>
					<input type="text" name="age" value="<?php echo htmlentities($age); ?>">
				<br>
				<label for="Email">Email: </label><br>
					<input type="text" name="email" value="<?php echo htmlentities($email); ?>">
				<br>
				<label for="Password">Password: </label><br>
					<textarea name="Password"><?php echo htmlentities($address); ?></textarea>
				<br>
				<label for="gender">Gender: </label><br>
					<textarea name="gender"><?php echo htmlentities($gender); ?></textarea>
				<br>
				<label for="fid">Faculty-id: </label><br>
					<textarea name="fid"><?php echo htmlentities($fid); ?></textarea>
				<br>

			<input type="hidden" name="form-submitted" value="1">
			<input type="submit" value="Submit">
			<button type="button" onclick="location.href='index.php'">Cancel</button>
		</form>
	</body>
</html>
