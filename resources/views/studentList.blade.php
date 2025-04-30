<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNxg1vY0ppn6w1po22UecZnYeeVOQFXHeKmw&s">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h3>Student`s Lists</h3>
        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>
        <a href="{{ route('logout') }}" class="btn btn-danger float-end me-2">Logout</a>
        <table class="table text-center align-middle" style="table-layout: fixed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Province</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $stu )
                <tr>
                    <td>{{ $stu->id }}</td>
                    <td>{{ $stu->name }}</td>
                    <td>{{ $stu->gender }}</td>
                    <td>{{ $stu->age }}</td>
                    <td>{{ $stu->address }}</td>
                    <td>{{ $stu->province}}</td>
                    <td><img width="80px" src="{{ $stu->profile }}" alt=""></td>
                    <td>

                        <a href="{{ route('editStudent',$stu->id) }}"><button class="btn btn-warning" >Edit</button></a>
                        <button class="btn btn-danger" data-id="{{ $stu->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="btnDelete">Delete</button>
                    </td>
               </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('addStudentSubmit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" name="age" id="age" class="form-control" min="18" max="60">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="province">Select a Province:</label>
                        <select id="province" name="province" class="form-select">
                            <option value="banteay_meanchey">Banteay Meanchey</option>
                            <option value="battambang">Battambang</option>
                            <option value="kampong_cham">Kampong Cham</option>
                            <option value="kampong_chhnang">Kampong Chhnang</option>
                            <option value="kampong_speu">Kampong Speu</option>
                            <option value="kampong_thom">Kampong Thom</option>
                            <option value="kampot">Kampot</option>
                            <option value="kandal">Kandal</option>
                            <option value="koh_kong">Koh Kong</option>
                            <option value="kratie">Kratie</option>
                            <option value="mondulkiri">Mondulkiri</option>
                            <option value="oddar_meanchey">Oddar Meanchey</option>
                            <option value="pailin">Pailin</option>
                            <option value="preah_vihear">Preah Vihear</option>
                            <option value="prey_veng">Prey Veng</option>
                            <option value="pursat">Pursat</option>
                            <option value="ratanakiri">Ratanakiri</option>
                            <option value="siem_reap">Siem Reap</option>
                            <option value="preah_sihanouk">Preah Sihanouk</option>
                            <option value="stung_treng">Stung Treng</option>
                            <option value="svay_rieng">Svay Rieng</option>
                            <option value="takeo">Takeo</option>
                            <option value="tboung_khmum">Tboung Khmum</option>
                            <option value="phnom_penh">Phnom Penh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile" class="form-label">Profile</label>
                        <input type="file" name="profile" id="profile" class="form-control" >
                    </div>
                    <div class="form-gro">
                        <button class="btn btn-danger mt-3 me-2">Cancel</button>
                        <button class="btn btn-primary mt-3">Save</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      {{-- modal delete --}}
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this student?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('deleteStudent') }}" method="post">
                @csrf
                <input type="hidden" name="hide_id" id="hide_id">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Yes, delete.</button>
              </form>
            </div>

          </div>
        </div>
      </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $(document).on('click','#btnDelete',function(){
            var id=$(this).attr('data-id');
            $('#hide_id').val(id)
        })
    })
</script>
