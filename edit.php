<?php 
    date_default_timezone_set('Asia/Phnom_Penh');
    include 'connection.php';
    $id=$_POST['stu_id'];
   
    $name=$_POST['stu_name'];
    $sex=$_POST['stu_sex'];
    $email=$_POST['stu_email'];
    $age=$_POST['stu_age'];
    $major=$_POST['stu_major'];
    $profile=$_POST['stu_profile'];

    $update_at=date('ymdhis');
 
    global $con;
    $editStudent="UPDATE `tbl_ajax` SET `student_name`='$name',`sex`='$sex',`email`='$email',`age`='$age',
    `major`='$major',`profile`='$profile',`update_at`='$update_at' WHERE `student_id`='$id'";
    if($con->query($editStudent)==TRUE){
        echo 'Success';
    }else{
        echo 'Error';
    }
?>