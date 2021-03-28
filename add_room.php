<?php
require 'core.inc.php';
if (loggedin()) {
	$build=$_POST["build"];
	$floor=$_POST["floor"];
	$room = $_POST["room"];
	$rows = $_POST["rows"];
	$cols = $_POST["cols"];
	$faculty = $_POST["faculty"];
	$faculty2 = $_POST["faculty2"];
	$timing = $_POST["timing"];
	$sql = "INSERT INTO room (build,floor,`room`, `rows`, cols, faculty, faculty2, timing) VALUES ('$build','$floor','$room','$rows','$cols','$faculty','$faculty2','$timing')";
	if ($connect->query($sql) === TRUE) {
		echo "New room created successfully";
		for ($i=0; $i < $cols; $i++) { 
			for ($j=0; $j < $rows; $j++) { 
				$student = $_POST["roll_no"][$i]+$j;
				$row = $j+1;
				$col = $i+1;
				$branch = $_POST["branch"][$i];
				$branch_stu = $_POST["branch"][$i].'_'.$student;
				$sql = "INSERT INTO student (build,floor,student, room, row, col, branch, branch_stu) VALUES ('$build','$floor','$student', '$room', '$row', '$col','$branch','$branch_stu')";
				if ($connect->query($sql) === TRUE) {
					echo "Student Roll No: ".($_POST["roll_no"][$i]+$j)." added successfully";
					echo "<br>";
				} else {
					echo "Error: " . $sql . "<br>" . $connect->error;
					echo "<br><br>";
				}
			}
		}
	header('Location: view.php?roomno='.$room);
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}
} else {
	header('Location: login.html');
}