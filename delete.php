<?php 
include 'connection.php';
$id=$_POST['stu_id'];
$delete="DELETE FROM `tbl_ajax` WHERE `student_id`='$id'";
$con->query($delete);
echo 'Success';
?>