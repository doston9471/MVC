<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $student->student_name; ?></title>
    </head>
    <body>
        <h1><?php echo $student->student_name; ?></h1>
        <div>
            <span class="label">Age:</span>
            <?php echo $student->age; ?>
        </div>
        <div>
            <span class="label">Email:</span>
            <?php echo $student->email; ?>
        </div>
        <div>
            <span class="label">Gender:</span>
            <?php echo $student->gender; ?>
        </div>
        <div>
            <span class="label">Faculty-id:</span>
            <?php echo $student->fid; ?>
        </div>
    </body>
</html>
