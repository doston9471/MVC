<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Students</title>
		<style type="text/css">
			table.students {
				width: 100%;
			}
			table.students thead {
				background-color: #eee;
				text-align: left;

			}
			table.students thead th {
				border: solid 1px #fff;
				padding: 3px;
			}
			table.students tbody td {
				border: solid 1px #eee;
				padding: 3px;
			}
			a, a:hover, a:active, a:visited {
				color: blue;
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<h3>Studentter</h3>
		<div><a href="index.php?op=new">Add new student</a></div><br>
			<table class="students" border="0" cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th><a href="?orderby=name">Name</a></th>
						<th><a href="?orderby=phone">Age</a></th>
						<th><a href="?orderby=email">Email</a></th>
						<th><a href="?orderby=address">Gender</a></th>
						<th><a href="?orderby=address">Faculty-id</a></th>
						<th>&nbsp</th>
						<th>&nbsp</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($students as $student) : ?>
						<tr>
							<td><a href="index.php?op=show&id=<?php echo $student->id; ?>"><?php echo htmlentities($student->student_name); ?></a></td>
							<td><?php echo htmlentities($student->age); ?></td>
							<td><?php echo htmlentities($student->email); ?></td>
							<td><?php echo htmlentities($student->gender); ?></td>
							<td><?php echo htmlentities($student->fid); ?></td>
							<td><a href="index.php?op=edit&id=<?php echo $student->id; ?>">edit</a></td>
							<td><a href="index.php?op=delete&id=<?php echo $student->id; ?>" onclick="return confirm('Are you sure you want to delete?');">delete</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
	</body>
</html>
