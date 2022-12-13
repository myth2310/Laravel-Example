<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
  </head>
  <body>
    <h1 class="text-center mb-4 mt-5">Edit Data Mahasiswa</h1>


    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
              @if(session('status'))
                <div class="alert alert-primary" role="alert">
                {{session('status')}}
                </div>
              @endif
                  <form action="{{url('/update-mahasiswa/'.$mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('put')
                      <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{$mahasiswa->nama}}">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$mahasiswa->email}}">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" name="profile_image" >
                        <img src="{{asset('storage/image/mahasiswa/'.$mahasiswa->profile_image)}}" alt="Gambar" width="50px" height="50px">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Simpan Mahasiswa</button>
                    </form>
                    <a href="/tampilmahasiswa">Back to Mahasiswa</a>
              </div>
          </div>
          </div>
          
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>