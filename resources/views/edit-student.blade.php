<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    form{
        width: 500px;
        margin: auto;
        margin-top: 50px;
        background-color: #fff;
        border-radius: 10px; 
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 30px

    }
</style>
<body>
    <div class="container">

        <form action="{{route('editStudentSubmit',$student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center">Edit Student</h2>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
            </div>
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>

            </div>
            <div class="form-group">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" min="18" max="60" value="{{ $student->age }}">
            </div>
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
            </div>
            <div class="form-group">
                <label for="province">Select a Province:</label>
                <select id="province" name="province" class="form-select">
                    <option value="banteay_meanchey" {{ $student->province == 'banteay_meanchey' ? 'selected' : '' }}>Banteay Meanchey</option>
                    <option value="battambang" {{ $student->province == 'battambang' ? 'selected' : '' }}>Battambang</option>
                    <option value="kampong_cham" {{ $student->province == 'kampong_cham' ? 'selected' : '' }}>Kampong Cham</option>
                    <option value="kampong_chhnang" {{ $student->province == 'kampong_chhnang' ? 'selected' : '' }}>Kampong Chhnang</option>
                    <option value="kampong_speu" {{ $student->province == 'kampong_speu' ? 'selected' : '' }}>Kampong Speu</option>
                    <option value="kampong_thom" {{ $student->province == 'kampong_thom' ? 'selected' : '' }}>Kampong Thom</option>
                    <option value="kampot" {{ $student->province == 'kampot' ? 'selected' : '' }}>Kampot</option>
                    <option value="kandal" {{ $student->province == 'kandal' ? 'selected' : '' }}>Kandal</option>
                    <option value="koh_kong" {{ $student->province == 'koh_kong' ? 'selected' : '' }}>Koh Kong</option>
                    <option value="kratie" {{ $student->province == 'kratie' ? 'selected' : '' }}>Kratie</option>
                    <option value="mondulkiri" {{ $student->province == 'mondulkiri' ? 'selected' : '' }}>Mondulkiri</option>
                    <option value="oddar_meanchey" {{ $student->province == 'oddar_meanchey' ? 'selected' : '' }}>Oddar Meanchey</option>
                    <option value="pailin" {{ $student->province == 'pailin' ? 'selected' : '' }}>Pailin</option>
                    <option value="preah_vihear" {{ $student->province == 'preah_vihear' ? 'selected' : '' }}>Preah Vihear</option>
                    <option value="prey_veng" {{ $student->province == 'prey_veng' ? 'selected' : '' }}>Prey Veng</option>
                    <option value="pursat" {{ $student->province == 'pursat' ? 'selected' : '' }}>Pursat</option>
                    <option value="ratanakiri" {{ $student->province == 'ratanakiri' ? 'selected' : '' }}>Ratanakiri</option>
                    <option value="siem_reap" {{ $student->province == 'siem_reap' ? 'selected' : '' }}>Siem Reap</option>
                    <option value="preah_sihanouk" {{ $student->province == 'preah_sihanouk' ? 'selected' : '' }}>Preah Sihanouk</option>
                    <option value="stung_treng" {{ $student->province == 'stung_treng' ? 'selected' : '' }}>Stung Treng</option>
                    <option value="svay_rieng" {{ $student->province == 'svay_rieng' ? 'selected' : '' }}>Svay Rieng</option>
                    <option value="takeo" {{ $student->province == 'takeo' ? 'selected' : '' }}>Takeo</option>
                    <option value="tboung_khmum" {{ $student->province == 'tboung_khmum' ? 'selected' : '' }}>Tboung Khmum</option>
                    <option value="phnom_penh" {{ $student->province == 'phnom_penh' ? 'selected' : '' }}>Phnom Penh</option>
                </select>

            </div>
            <div class="form-group">
                <label for="profile" class="form-label">Profile</label>
                <input type="file" name="profile" id="profile" class="form-control" >
                <img class="mt-2"  width="80" src="{{ asset($student->profile) }}" alt="img">
                <input type="text" name="old_image" id="old_image" value="{{ $student->profile}}" >

            </div>
            <div class="form-group">
                <button class="btn btn-danger mt-3 me-2"><a href="/" style="text-decoration: none;color:#fff;">Cancel</a></button>
                <button class="btn btn-success mt-3">Edit</button>
            </div>
        </form>
    </div>
</body>
</html>
