<?php 
    include "../connection.php";
    session_start();
    function moveFile($name){
        $image=rand(1,1000).'_'.$_FILES[$name]['name'];
        $tmp_name=$_FILES[$name]['tmp_name'];
        $path="../images/".$image;
        move_uploaded_file($tmp_name,$path);
        return $image;
    }
    function registerAccount(){
        if(isset($_POST['signup'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $profile=moveFile('profile');
            global $connection;
            if($username==''|| $email==''|| $password==''){
                echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Please enter all data!",
                        icon: "error"
                    });
                </script>';
                
               
            }else{
                $insertUser="INSERT INTO `tbl_user`(`userName`, `email`, `password`, `profile`) 
                VALUES ('$username','$email','$password','$profile')";
                $connection->query($insertUser);
                header("location: login.php");
            }
        }
    }
    function login() {
       
        if (isset($_POST['login'])) {
            global $connection;
            $name_email = $_POST['name_email'];
            $password = $_POST['password'];
            $getuser = "SELECT `userName`, `role` FROM `tbl_user` WHERE (`userName`='$name_email' OR `email` = '$name_email') AND `password` = '$password'";
            $stmt = $connection->query($getuser);
            if($row=$stmt->fetch_assoc()){
               $_SESSION['user']=$row['userName']; 
               $_SESSION['role']=$row['role'];
               echo $_SESSION['user'];
               echo $_SESSION['role'];
               if($_SESSION['role']=='admin'){
                    echo '<script>window.location.href="dashboard.php"</script>';
               }else if($_SESSION['role']=='user'){
                    header('location: ../User/index.php');
               }else{
                    echo "Error!";
               }
            }else{
                echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Invalid username or password!",
                        icon: "error"
                    });
                </script>';
            }
            
                
        }
    }
    
?>