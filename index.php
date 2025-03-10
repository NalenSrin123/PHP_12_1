<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Student</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <h2>Student List</h2>
        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
        <table class="table table-hover align-middle text-center" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Major</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php 
                    include 'connection.php';
                    global $con;
                    $sql="SELECT * FROM `tbl_ajax`";
                    $result=$con->query($sql);
                    while($row=$result->fetch_assoc()){
                        echo '
                            <tr>
                            <td>'.$row['student_id'].'</td>
                            <td>'.$row['student_name'].'</td>
                            <td>'.$row['sex'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['age'].'</td>
                            <td>'.$row['major'].'</td>
                            <td>
                                <img width="80px" src="Images/'.$row['profile'].'" alt="">
                            </td>
                    
                            <td>
                                <button type="submit" class="btn btn-warning">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="text-center">Add Student</h3>
            <div class="form-group">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Sex</label>
                <select name="sex" id="sex" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>     
            </div>
            <div class="form-group">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" >
            </div>
            <div class="form-group">
                <label for="" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" min="18" max="60">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Major</label>
                <select name="major" id="major" class="form-control">
                    <option value="CS">CS</option>
                    <option value="ITE">ITE</option>
                    <option value="Math">Math</option>
                    <option value="Khmer">Khmer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Profile</label>
                <input type="file" name="profile" id="profile" class="form-control d-none"> <br>
                <img width="80px" src="Images/userIcon.png" alt="" id="default_profile" style="cursor: pointer;">
                <input type="hidden" name="img" id="img">
            </div>
            <div class="form-group mt-3 d-flex justify-content-end">
            <button type="button" class="btn btn-primary me-2" name="save" id="save">Save</button>
            <button class="btn btn-danger">Cancel</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#default_profile').click(function(){
              $('#profile').click();  
        })
        $('#profile').change(function(){
            var form_data=new FormData();
            var file=$('#profile')[0].files;
            form_data.append("profile",file[0]);
            $.ajax({
                url:'moveFile.php',
                method:"POST",
                data:form_data,
                contentType:false,
                processData:false,
                cache:false,
                success:function(res){
                   $('#default_profile').attr('src','./Images/'+res);
                    $('#img').val(res);
                }    
            });
        })
        $('#save').click(function(){
            $('#exampleModal').modal('hide');
            const name=$('#name').val()
            const sex=$('#sex').val();
            const email=$('#email').val();
            const age=$('#age').val();
            const major=$("#major").val();
            const profile=$('#img').val();
            
            $.ajax({
                url:'insert.php',
                method:"POST",
                data:{
                    stu_name:name,
                    stu_sex:sex,
                    stu_email:email,
                    stu_age:age,
                    stu_major:major,
                    stu_profile:profile
                },
                cache:false,
                success:function(res){
                
                    $('#tbody').append(`
                        <tr>
                            <td>${res}</td>
                            <td>${name}</td>
                            <td>${sex}</td>
                            <td>${email}</td>
                            <td>${age}</td>
                            <td>${major}</td>
                            <td>
                                <img width="80px" src="./Images/${profile}" alt="">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning">Edit</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                            `);  
                }
            });   
        })
    })
</script>