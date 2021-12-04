<?php
require_once ('dbconnect.php');

$s_fullname = $s_msv = $s_class = $s_gpa = '';

if (!empty($_POST)) {
	

	if (isset($_POST['fullname'])) {
		$s_fullname = $_POST['fullname'];
	}

	if (isset($_POST['msv'])) {
		$s_msv = $_POST['msv'];
	}

	if (isset($_POST['class'])) {
		$s_class = $_POST['class'];
	}

	if (isset($_POST['gpa'])) {
		$s_gpa = $_POST['gpa'];
	}

	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	

	if ($s_id != '') {
		//update
		$sql = "update student set fullname = '$s_fullname', msv = '$s_msv', class = '$s_class', gpa = '$s_gpa' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into student(fullname, msv, class, gpa) value ('$s_fullname', '$s_msv', '$s_class', '$s_gpa')";
	}
	execute($sql);

	header('Location: tables.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from student where id = '.$id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_fullname = $std['fullname'];
		$s_msv      = $std['msv'];
		$s_class  = $std['class'];
        $s_gpa  = $std['gpa'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thông tin sinh viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Họ tên:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$s_fullname?>">
					</div>
					<div class="form-group">
					  <label for="msv">Mã sinh viên:</label>
					  <input type="text" class="form-control" id="msv" name="msv" value="<?=$s_msv?>">
					</div>
					<div class="form-group">
					  <label for="class">Lớp:</label>
					  <input type="text" class="form-control" id="class" name="class" value="<?=$s_class?>">
					</div>
                    <div class="form-group">
					  <label for="gpa">GPA:</label>
					  <input type="text" class="form-control" id="gpa" name="gpa" value="<?=$s_gpa?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>