<?php 
include 'connection.php';
    $name=$_POST['stu_name'];
    $sex=$_POST['stu_sex'];
    $email=$_POST['stu_email'];
    $age=$_POST['stu_age'];
    $major=$_POST['stu_major'];
    $profile=$_POST['stu_profile'];
    global $con;
    $insert="INSERT INTO `tbl_ajax`( `student_name`, `sex`, `email`, `age`, `major`, `profile`) 
    VALUES ('$name','$sex','$email','$age','$major','$profile')";
    $con->query($insert);
    $selectID="SELECT `student_id` FROM `tbl_ajax` ORDER BY `student_id` DESC LIMIT 1";
    $row=$con->query($selectID);
    $id=$row->fetch_assoc()['student_id'];
    echo $id;
?>